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
        // Obtener la información necesaria para generar el QR
        $competitor = Competitor::findOrFail($competitor);
        $race = Race::findOrFail($race);
    
            // Crear los datos para el código QR
            // $qrData = "Nombre: " . $competitor . ", Race: " . $race;
        $url = route('qr.savetime', ['race' => $race, 'competitor' => $competitor]);
        $qrData = "URL: " . $url;

    
        // Generar el código QR como un objeto QrCode
        $qrCode = QrCode::size(300)->generate($qrData);
    
        // Generar el contenido HTML para el PDF con el QR en el medio
        $html = '<h1 style="text-align: center;">' . $race->name . '</h1>';
        $html .= '<h1 style="text-align: center;">' . $number . '</h1>';

        $html .= '<div style="text-align: center;">';
        $html .= '<img src="data:image/png;base64,' . base64_encode($qrCode) . '" alt="QR Code">';
        $html .= '</div>';


        $html .= '<h1 style="text-align: center;">'.$competitor->name.'</h1>';
        


        // Configurar Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $dompdf = new Dompdf($options);
    
        // Cargar el contenido HTML en Dompdf
        $dompdf->loadHtml($html);
    
        // Renderizar el PDF
        $dompdf->render();
    
        // Devolver el PDF generado
        return $dompdf->stream('competitor_dorsal.pdf');
    }


    public function all_qr(Race $race)
    {
        // Obtener todos los Inscriptions para la Race
        $inscriptions = Inscription::where('race', $race->id)->get();

        // Configurar Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $dompdf = new Dompdf($options);

        // Inicializar el contenido HTML del PDF
        $html = '';

        // Iterar sobre cada Inscription
        foreach ($inscriptions as $inscription) {
            // Obtener información del Competitor y la Race
            $competitor = Competitor::findOrFail($inscription->competitor);
            $race = Race::findOrFail($race->id);

            // Crear la URL para el Inscription
            $url = route('qr.savetime', ['race' => $race->id, 'competitor' => $inscription->competitor]);
            
            // Crear el código QR para la URL
            $qrCode = QrCode::size(300)->generate($url);

            // Agregar la información del Inscription al HTML
            $html .= '<h1 style="text-align: center;">' . $race->name . '</h1>';
            $html .= '<h1 style="text-align: center;">' . $inscription->number . '</h1>';
            $html .= '<div style="text-align: center;">';
            $html .= '<img src="data:image/png;base64,' . base64_encode($qrCode) . '" alt="QR Code">';
            $html .= '</div>';
            $html .= '<h1 style="text-align: center;">'.$competitor->name.'</h1>';

            // Agregar un salto de página HTML después de cada Inscription
            $html .= '<div style="page-break-after: always;"></div>';
        }

        // Cargar el contenido HTML en Dompdf
        $dompdf->loadHtml($html);

        // Renderizar el PDF
        $dompdf->render();

        // Devolver el PDF generado
        return $dompdf->stream('qr_Competitores.pdf');
    }

    public function save_time(Race $race, Competitor $competitor){
        $competitor = Competitor::findOrFail($competitor);
        $race = Race::findOrFail($race);

        $now = new \DateTime();

        if($competitor->sex){
            $arrives = Inscription::where('race', $race)->where('arrival', '!=', null)->get();

            $competitor_age = $now->diff($competitor->birthdate)->y;

            $competitors_arrived = [];
            foreach($arrives as $arrive){
                if($arrive->sex){
                    $arrive_age = $now->diff($arrive->competitor->birthdate)->y;
                    if($competitor_age <= 20 && $arrive_age <= 20){
                        $competitors_arrived[] = $arrive->competitor;
                    } elseif($competitor_age >= 21 && $competitor_age <= 30 && $arrive_age >= 21 && $arrive_age <= 30){
                        $competitors_arrived[] = $arrive->competitor;
                    } elseif($competitor_age >= 31 && $competitor_age <= 40 && $arrive_age >= 31 && $arrive_age <= 40){
                        $competitors_arrived[] = $arrive->competitor;
                    } elseif($competitor_age >= 41 && $competitor_age <= 50 && $arrive_age >= 41 && $arrive_age <= 50){
                        $competitors_arrived[] = $arrive->competitor;
                    } elseif($competitor_age >= 51 && $competitor_age <= 60 && $arrive_age >= 51 && $arrive_age <= 60){
                        $competitors_arrived[] = $arrive->competitor;
                    } elseif($competitor_age >= 61 && $arrive_age >= 61){
                        $competitors_arrived[] = $arrive->competitor;
                    }
                }
            }
        }
        $points = 1000;
        $competitor->points += max(0, $points - (count($competitors_arrived) * 100));
        $competitor->update();

        $inscription = Inscription::where('race', $race)->where('competitor', $competitor)->get()->first();
        $inscription->arrival = $now;
        $inscription->update();

        return redirect()->route('/')->with('success', 'Time successfully registered');
    }
}
