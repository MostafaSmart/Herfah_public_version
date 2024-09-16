<div class="col-md-3">
                
    <div href=# class="d-inline">
        <img src="{{ URL::asset($client->personal_image) }}" width=130px style="margin:0;">
        <br>
        <p class="pl-2 mt-2">
            <a href="#" id="img_ching" class="btn" style="color:#8f9096;font-weight:600">تغير الصورة</a>
        </p>
    </div>
    
    
</div>
<div id="img_form">
    <form  action="{{ route('client.update',$client) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
     <hr>
        
        <label for="">اختر صورة جديدة</label>
    
        <input  name="img" class="input" type="file"/>
        
        

        <div class="row mt-5">
            
           
            
                <button type="submit" class="btn btn-primary btn-block">حفظ</button>            
           
            
            
            
                <button type="button" onclick="closeForm('#img_form','#info_form')" class="btn btn-default btn-block">الغاء</button>
            
            
        
        </div>
    
    </form>
  
                
    
    
</div>

<hr>
<div id="info_form" class="col-md-9">
    
    <div class="container">
    
        <form method="POST" action="{{ route('user.update',$user) }}" enctype="multipart/form-data">
    
            @method('PUT')
            @csrf
            <div class="form-group">

                <label for=f_name>الاسم الاول</label>
                <input type="text" class="form-control" name="f_name" id="f_name" value="{{ $user->name }}">

            </div>
            <div class="form-group">

                <label for=l_name>الاسم الاخير</label>
                <input type="text" class="form-control" name="l_name" id="l_name" value="{{ $user->l_name }}">

            </div>
            <div class="form-group">

                <label for=email>البريد</label>
                <input type="email" class="form-control" name="email" disabled value="{{ $user->email }}" id="email">

            </div>
            <div class="form-group">

                <label for="phone">البريد</label>
                <input type="number" class="form-control" name="phone" disabled value="{{ $user->PhoneNumber }}" id="phone">

            </div>
         
            <div class="form-group ">

                <label for=birthday>تاريخ الميلاد</label>
                <input type="date" class="form-control" value="{{ $user->birthdate }}" id="birthday">

            </div>
            
       
            <div class="row mt-5">
            
           
            
                <button type="submit" class="btn btn-primary btn-block">حفظ التغيرات</button>            
           
            
            
            
                <button type="button" class="btn btn-default btn-block">الغاء</button>
            
            
        
        </div>

        </form>
    
    </div>

</div>
