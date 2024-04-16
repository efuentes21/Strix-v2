<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Race;
use App\Models\Competitor;
use App\Models\Inscription;
use Dompdf\Dompdf;
use Dompdf\Options;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Carbon\Carbon;

class InscriptionController extends Controller
{
    /**
     * Shows every competitor in a race
     */
    public function index(Race $race)
    {
        $inscriptions = Inscription::where('race', $race->id)->get();
        $datas = [];
        foreach($inscriptions as $inscription){
            $datas[] =  [
                'dni' => Competitor::where('id', $inscription->competitor)->get()->first()->dni,
                'id' => $inscription->competitor, 
                'name' => Competitor::where('id', $inscription->competitor)->get()->first()->name,
                'number' => $inscription->number
            ];
        }
        return view('admin.inscriptions.index', compact('datas', 'race'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create($raceId)
    {
        $race = Race::findOrFail($raceId);
        $insurances = $race->insurances;
        return view('user.inscriptions.index', compact('race', 'insurances'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $raceId)
    {
        $validatedData = $request->validate([
            'dni' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'email' => 'required|string|max:255',
            'sex' => 'required',
            'pro' => 'required',
            'insurance' => 'required',
        ]);

        $competitorExist = Competitor::where('dni', $validatedData['dni'])->where('partner', false)->first();
        $competitorIsPartner = Competitor::where('dni', $validatedData['dni'])->where('partner', true)->first();

        try {
            if($competitorExist) {
                $competitorExist->name = $validatedData['name'];
                $competitorExist->email = $validatedData['email'];
                $competitorExist->birthdate = $validatedData['birthdate'];
                $competitorExist->sex = $validatedData['sex'];
                $competitorExist->pro = $validatedData['pro'];

                $competitorExist->update();

                $idCompetitor = $competitorExist->id;
            } else if($competitorIsPartner) {
                return redirect()->back()->with('error', 'Already registered as a partner');
            }else {
                $competitor = Competitor::create([
                    'dni' => $validatedData['dni'],
                    'name' => $validatedData['name'],
                    'email' => $validatedData['email'],
                    'birthdate' => $validatedData['birthdate'],
                    'sex' => $validatedData['sex'],
                    'pro' => $validatedData['pro'],
                    'points' => 0,
                    'partner' => false,
                    'active' => true,
                    'address' => '',
                    'password' => '',
                    'federation' => null,
                ]);

                $idCompetitor = $competitor->id;
            }

            $inscriptionExists = Inscription::where('competitor', $idCompetitor)->where('race', $raceId)->first();

            if(!$inscriptionExists) {
                $inscription = [
                    'race' => $raceId,
                    'competitor' => $idCompetitor,
                    'number' => 1,
                    'arrival' => null,
                    'insurance' => $validatedData['insurance'],
                ];

                Inscription::create($inscription);
            } else {
                return redirect()->back()->with('error', 'Already inscripted in the race');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('/')->with('success', 'Inscription successfully created!');
    }

    /**
     * Prints a PDF containing all the competitors inscripted in a race
     */
    public function print(Race $race){
        //$inscriptions = Inscription::with('competitor')->where('race', $race)->get();
        $inscriptions = Inscription::where('race', $race->id)->with('competitors')->orderBy('competitor')->get();
        return view('admin.inscriptions.pdf', compact(['inscriptions', 'race']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storelogged($raceId)
    {
        try {
            $inscription = [
                'race' => $raceId,
                'competitor' => Auth::guard('competitor')->user()->id,
                'number' => 1,
                'arrival' => null,
                'insurance' => 1,
            ];

            Inscription::create($inscription);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('/')->with('success', 'Inscription successfully created!');
    }

    public function simple_qr($race, $competitor, $number)
    {
        $competitor = Competitor::findOrFail($competitor);
        $race = Race::findOrFail($race);

        $url = route('qr.savetime', ['race' => $race, 'competitor' => $competitor]);
        $qrData = "URL: " . $url;

        $qrCode = QrCode::size(300)->generate($qrData);
    
        $html = '<h1 style="text-align: center; font-size: 64px;">'.$competitor->name.'</h1>';
        $html .= '<h1 style="text-align: center; font-size: 64px;">' . $number . '</h1>';
        $html .= '<div style="width: 100%; height: 50px;"></div>';
        $html .= '<div style="text-align: center;">';
        $html .= '<img src="data:image/png;base64,' . base64_encode($qrCode) . '" alt="QR Code">';
        $html .= '</div>';

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $dompdf = new Dompdf($options);
    
        $dompdf->loadHtml($html);

        $dompdf->render();
    
        return $dompdf->stream('competitor_dorsal.pdf');
    }


    public function all_qr(Race $race)
    {
        $inscriptions = Inscription::where('race', $race->id)->get();

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $dompdf = new Dompdf($options);

        $html = '';

        foreach ($inscriptions as $inscription) {
            $competitor = Competitor::findOrFail($inscription->competitor);
            $race = Race::findOrFail($race->id);

            $url = route('qr.savetime', ['race' => $race->id, 'competitor' => $inscription->competitor]);
            
            $qrCode = QrCode::size(300)->generate($url);

            $html .= '<h1 style="text-align: center; font-size: 64px;">' . $competitor->name.'</h1>';
            $html .= '<h1 style="text-align: center; font-size: 64px;">' . $inscription->number . '</h1>';
            $html .= '<div style="width: 100%; height: 50px;"></div>';
            $html .= '<div style="text-align: center;">';
            $html .= '<img src="data:image/png;base64,' . base64_encode($qrCode) . '" alt="QR Code">';
            $html .= '</div>';

            $html .= '<div style="page-break-after: always;"></div>';
        }

        $dompdf->loadHtml($html);

        $dompdf->render();

        return $dompdf->stream('qr_Competitores.pdf');
    }

    public function save_time(Race $race, Competitor $competitor){
        $competitor = Competitor::findOrFail($competitor->id);
        $race = Race::findOrFail($race->id);

        $now = new \DateTime();

        $arrives = Inscription::where('race', $race->id)->where('arrival', '!=', null)->get();

        $competitor_age = Carbon::parse($competitor->birthdate)->age;
        $competitors_arrived = 0;
        if($competitor->sex){
            foreach($arrives as $arrive){
                if($arrive->sex){
                    $arrive_age = Carbon::parse($arrive->competitors->birthdate)->age;
                    if($competitor_age <= 20 && $arrive_age <= 20){
                        $competitors_arrived += 1;
                    } elseif($competitor_age >= 21 && $competitor_age <= 30 && $arrive_age >= 21 && $arrive_age <= 30){
                        $competitors_arrived += 1;
                    } elseif($competitor_age >= 31 && $competitor_age <= 40 && $arrive_age >= 31 && $arrive_age <= 40){
                        $competitors_arrived += 1;
                    } elseif($competitor_age >= 41 && $competitor_age <= 50 && $arrive_age >= 41 && $arrive_age <= 50){
                        $competitors_arrived += 1;
                    } elseif($competitor_age >= 51 && $competitor_age <= 60 && $arrive_age >= 51 && $arrive_age <= 60){
                        $competitors_arrived += 1;
                    } elseif($competitor_age >= 61 && $arrive_age >= 61){
                        $competitors_arrived += 1;
                    }
                }
            }
        } else {
            foreach($arrives as $arrive){
                if(!$arrive->sex){
                    $arrive_age = Carbon::parse($arrive->competitors->birthdate)->age;
                    if($competitor_age <= 20 && $arrive_age <= 20){
                        $competitors_arrived += 1;
                    } elseif($competitor_age >= 21 && $competitor_age <= 30 && $arrive_age >= 21 && $arrive_age <= 30){
                        $competitors_arrived += 1;
                    } elseif($competitor_age >= 31 && $competitor_age <= 40 && $arrive_age >= 31 && $arrive_age <= 40){
                        $competitors_arrived += 1;
                    } elseif($competitor_age >= 41 && $competitor_age <= 50 && $arrive_age >= 41 && $arrive_age <= 50){
                        $competitors_arrived += 1;
                    } elseif($competitor_age >= 51 && $competitor_age <= 60 && $arrive_age >= 51 && $arrive_age <= 60){
                        $competitors_arrived += 1;
                    } elseif($competitor_age >= 61 && $arrive_age >= 61){
                        $competitors_arrived += 1;
                    }
                }
            }
        }
        
        $points = 1000;
        $competitor->points += max(0, $points - ($competitors_arrived * 100));
        $competitor->update();
        
        $inscription = Inscription::where('race', $race->id)->where('competitor', $competitor->id)->get()->first();
        $inscription->arrival = $now;
        $inscription->update();
        
        return redirect()->route('/')->with('success', 'Time successfully registered');
    }

    public function print_rankings(Race $race){
        $race = Race::findOrFail($race->id);
        $date = $race->date->toDateString();
        $time = $race->time->toTimeString();
        $race_datetime = Carbon::createFromFormat('Y-m-d H:i:s', "$date $time");

        $arrives = Inscription::where('race', $race->id)->where('arrival', '!=', null)->orderBy('arrival')->get();
        $ages = [20, 30, 40, 50, 60, 70];
        $html = '<style>
                table {
                    width: 100%;
                }
                th {
                    border: solid black 1px;
                    border-collapse: collapse;
                    border-spacing: 0;
                }
                * {
                    box-sizing: border-box;
                }
                </style>';
        $age_ranges = [[1, 20], [21, 30], [31, 40], [41, 50], [51, 60], [61, 150]];
        $index = 0;
        foreach($ages as $age){
            // Men
            if($age >= $age_ranges[$index][0] && $age <= $age_ranges[$index][1]){
                $html .= '<h1>Master '.$age.' men ranking</h1>';
                $points = 1000;
                $html .= '<table>';
                $html .= '<tr><th>DNI</th><th>Competitor</th><th>Time</th><th>Points</th></tr>';
                foreach($arrives as $arrive){
                    $arrive_age = Carbon::parse($arrive->competitors->birthdate)->age;
                    $arrival_datetime = Carbon::createFromFormat('Y-m-d H:i:s', $arrive->arrival);
                    $time_difference = $arrival_datetime->diff($race_datetime);
                    if($arrive->competitors->sex == true && $arrive_age >= $age_ranges[$index][0] && $arrive_age <= $age_ranges[$index][1]){
                        $html .= '<tr><td>'.$arrive->competitors->dni.'</td><td>'.$arrive->competitors->name.'</td><td>'.$time_difference->format('%H:%I:%S').'</td><td>'.max(0, $points).'</td></tr>';
                        $points -= 100;
                    }
                }
                $html .= '</table>';
                $html .= '<div style="page-break-after: always;"></div>';
            }
            // Woman
            if($age >= $age_ranges[$index][0] && $age <= $age_ranges[$index][1]){
                $html .= '<h1>Master '.$age.' woman ranking</h1>';
                $points = 1000;
                $html .= '<table>';
                $html .= '<tr><th>DNI</th><th>Competitor</th><th>Time</th><th>Points</th></tr>';
                foreach($arrives as $arrive){
                    $arrive_age = Carbon::parse($arrive->competitors->birthdate)->age;
                    $arrival_datetime = new DateTime($arrive->arrival);
                    $time_difference = $arrival_datetime->diff($race_datetime);
                    if($arrive->competitors->sex == false && $arrive_age >= $age_ranges[$index][0] && $arrive_age <= $age_ranges[$index][1]){
                        $html .= '<tr><td>'.$arrive->competitors->dni.'</td><td>'.$arrive->competitors->name.'</td><td>'.$time_difference.'</td><td>'.max(0, $points).'</td></tr>';
                        $points -= 100;
                    }
                }
                $html .= '</table>';
                $html .= '<div style="page-break-after: always;"></div>';
            } 
            $index += 1;
        }

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $dompdf = new Dompdf($options);
    
        $dompdf->loadHtml($html);
        $dompdf->render();
    
        return $dompdf->stream('ranking.pdf');
    }
}
