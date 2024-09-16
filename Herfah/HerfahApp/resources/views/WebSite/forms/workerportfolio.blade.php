@extends('WebSite.forms.layout.index2')
@section('mainForm1')
    @parent
    <form method="POST" action="{{ route('request.store') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" value="3" name="opreation">
        <input type="hidden" value={{$data["portnum"]}} name="num">
        <input type="hidden" value={{$data["User_id"]}} name="User_id">
        <input type="hidden" value={{$data["f_name"]}} name="f_name">
        <input type="hidden" value={{$data["email"]}} name="email">
        <input type="hidden" value={{$data["gender"]}} name="gender">
        <input type="hidden" value={{$data["phone"]}} name="phone">
        <input type="hidden" value={{$data["birth"]}} name="birth">
        <input type="hidden" value={{$data["job"]}} name="job">
        <input type="hidden" value={{$data["about"]}} name="about">
        <input type="hidden" value={{$data["priceH"]}} name="priceH">
        <input type="hidden" value={{$data["priceM"]}} name="priceM">
        <input type="hidden" value={{$path1}} name="path1">
        <input type="hidden" value={{$path2}} name="path2">
        <div class="parent1">
            @for ($i=0; $i<$data["portnum"];$i++)
            <div class="card">
                <div class="card-info">
                    <textarea class="" placeholder="عن المشروع" name="portabout{{$i}}"></textarea>
                    <div class="Imagesport">
                    <input type="file" class="file" name="portimages{{$i}}[]" multiple>
                </div>
                </div>
            </div>
            @endfor
        </div>
        <div class="center-container">
            <input type="submit" value="إتمام الطلب" class="css-button-sliding-to-bottom--yellow" style="margin: 10px;" >
        </div>
    </form>
@endsection
