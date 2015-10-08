@inject('countries', 'App\Http\Utilities\Country')


<div class="row">

    <div class="col-md-6">
        {{ csrf_field() }}

        <!-- street  Textfield -->
        <div class="form-group">
            <label for="street">Street :</label>
            <input type="text" name="street" id="street" class="form-control" value="{{ old('street') }}" required>
        </div>

        <!-- city  Textfield -->
        <div class="form-group">
            <label for="city">City :</label>
            <input type="text" name="city" id="city" class="form-control" value="{{ old('city') }}" required>
        </div>

        <!-- zip  Textfield -->
        <div class="form-group">
            <label for="zip">Zip/Postal Code :</label>
            <input type="text" name="zip" id="zip" class="form-control" value="{{ old('zip') }}" required>
        </div>

        <!-- country  Selectfield -->
        <div class="form-group">
            <label for="country">Country :</label>
            <select type="text" name="country" id="country" class="form-control">

                @foreach($countries::all() as $code => $name)
                    <option value="{{ $code }}">{{ $name }}</option>
                @endforeach
            </select>
        </div>

        <!-- state  Textfield -->
        <div class="form-group">
            <label for="state">State :</label>
            <input type="text" name="state" id="state" class="form-control" value="{{ old('state') }}" required>
        </div>
    </div>

    <div class="col-md-6">
        <!-- price  Textfield -->
        <div class="form-group">
            <label for="price">Sale Price</label>
            <input type="text" name="price" id="price" class="form-control" value="{{ old('price') }}" required>
        </div>

        <!-- description  Textfield -->
        <div class="form-group">
            <label for="description">Description :</label>
            <textarea type="text" name="description" id="description" class="form-control" rows="10" required>
                {{ old('description') }}
            </textarea>
        </div>
    </div>
    <div class="col-md-12">

        <hr>

        <!-- CreateFlyer SubmitButton -->
        <div class="form-group">
            <button type="submit" id="CreateFlyer" class="btn btn-primary">Create Flyer</button>
        </div>
    </div>
</div>
