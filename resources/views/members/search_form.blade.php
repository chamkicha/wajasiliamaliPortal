

<form action="{{url('/reports/reportWanachamaSearch')}}" enctype="multipart/form-data" method="post" autocomplete="off">
    {{csrf_field()}}

    

    <div class="row">
        <div class="form-group col-md-4 col-lg-2">
            <label for="recipient-name" class="form-control-label">Mkoa: {{ $request->region ?? ' '}}</label>
            
            <select class="form-control mb-2" name="region" id="region" onchange="getDistrictById()">
                <option disabled selected="">Chagua Mkoa</option>
                @foreach($regions as $region)
                    <option value="{{$region['regionId']}}">{{$region['regionName']}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group col-md-4 col-lg-2">
            <label for="recipient-name" class="form-control-label">Wilaya:</label>
            
            <select  class="form-control mb-3" name="district" id="district" onchange="getWardById()">
                <option disabled selected="">Chagua Wilaya</option>
                
            </select>
        </div>

        <div class="form-group col-md-4 col-lg-2">
            <label for="recipient-name" class="form-control-label">Kata:</label>
            
            <select  class="form-control mb-3" name="ward" id="ward">
                <option disabled selected="">Chagua Kata</option>
                
            </select>
        </div>
        

        <div class="form-group col-md-4 col-lg-2">
            <label for="shirikisho-name" class="form-control-label">Vyama:</label>
            <select  class="form-control mb-3" name="shirikishoId" id="shirikishoId" onchange="getKikundiById()">
                <option disabled selected="">Chagua Chama</option>
                @foreach($shirikishos as $shirikisho)
                    <option value="{{$shirikisho['shirikishoId']}}">{{$shirikisho['shirikishoName']}}</option>
                @endforeach
            </select>
        </div>
        

        <div class="form-group col-md-4 col-lg-2">
            <label for="shirikisho-name" class="form-control-label">Kikundi:</label>
            <select  class="form-control mb-3" name="kikundiId" id="kikundiId">
                <option disabled selected="">Chagua Kikundi</option>
                
            </select>
        </div>
        

        <div class="form-group col-md-4 col-lg-2">
            <label for="shirikisho-name" class="form-control-label">Jinsi:</label>
            <select  class="form-control mb-3" name="sex" id="sex">
                <option disabled selected="">Chagua Jinsi</option>
                <option value="1">Wanaume</option>
                <option value="2">Wanawake</option>
                
            </select>
        </div>
        
        <div class="form-group col-md-4 col-lg-3">
            <button type="submit" class="btn btn-primary">Tafuta</button>
        </div

    </div>

</form>