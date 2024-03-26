<form action="{{ route('raceimages.store', ['race' => $race]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="dropzone" id="dropzone">
        <p>DROP IMAGES HERE</p>
        <input type="file" name="images[]" multiple hidden>
    </div>
    <button type="submit">Upload images</button>
</form>
