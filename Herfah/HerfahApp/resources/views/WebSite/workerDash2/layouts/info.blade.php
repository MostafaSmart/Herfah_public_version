
<div >
    <div class=""  style="display: flex; justify-content: space-between  ; background-image: url('{{ asset($worker->Image_cover) }}')" >
        <div class="col-md-3">
                    
            <div href=# class="d-inline " >
                <div >
                    <img src="{{ URL::asset($worker->personal_image) }}" width=130px style="margin:0;">

                </div>
                
                <br>
               <div style="display: flex; position: relative;">
                <p class="pl-2 mt-2">
                    <a href="#" id="img_chingP" onclick="profileCing('per')" class="btn btn-primary" style="padding: 5px"> الصورة الشخصية</a>
                </p>
                <p class="pl-2 mt-2">
                    <a href="#" id="img_chingC" onclick="profileCing('cover')" class="btn btn-primary" style="padding: 5px"> ًصورة الغلاف </a>
                </p>
               </div>
            </div>
            
            
        </div>
     
    </div>

    
<hr>
<div id="img_form">
    <form id="imf"    method="POST" action="{{ route('worker.update',$worker) }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
     <hr>
        <input type="text" name="flag" id="imgflag" hidden>
        <label for="">اختر صورة جديدة</label>
    
        <input  id = "imgChing" class="input" type="file"/>
        
        

        <div class="row mt-5">
            
           
            
                <button type="submit" class="btn btn-primary btn-block">حفظ</button>            
           
            
            
            
                <button type="button" onclick="closeForm('#img_form','#info_form')" class="btn btn-default btn-block">الغاء</button>
            
            
        
        </div>
    
    </form>
  
                
    
    
</div>
<div id="info_form"  style="display: flex; flex-wrap: wrap;" >
    
   
    
        <form method="POST" style="width: 400px ; margin-left: 20px" action="{{ route('user.update',$user) }}" enctype="multipart/form-data">
            <h4>البيانات الشخصية</h4>
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

                <label for="phone">الهاتف</label>
                <input type="number" class="form-control" name="phone" disabled value="{{ $user->PhoneNumber }}" id="phone">

            </div>
         
            <div class="form-group ">

                <label for=birthday>تاريخ الميلاد</label>
                <input type="date" class="form-control" value="{{ $user->birthdate }}" id="birthday">

            </div>
            
       
            <div class="form-group">
            
           
            
                <button type="submit" class="btn btn-primary btn-block">حفظ التغيرات</button>            
           
            
            
            
                <button type="button" class="btn btn-default btn-block">الغاء</button>
            
            
        
        </div>

        </form>
        


        <form method="POST" style="width: 400px ; margin-left: 20px" action="{{ route('worker.update',$worker) }}" enctype="multipart/form-data">
            <h4>بيانات العمل</h4>
            @method('PUT')
            @csrf
            <div class="form-group">

                <label for=about>حول</label>
                <input type="text" class="form-control" name="about" id="about" value="{{ $worker->about }}">

            </div>
            <div class="form-group">

                <label for=price_perHour>الاجر لكل ساعة</label>
                <input type="text" class="form-control" name="price_perHour" id="price_perHour" value="{{ $worker->price_perHour }}">

            </div>
            <div class="form-group">

                <label for=price_perMatter>الاجر لكل متر</label>
                <input type="text" class="form-control" name="price_perMatter"  value="{{ $worker->price_perMatter }}" id="price_perHour">

            </div>
         
            
       
            <div class="form-group">
 
            
                <button type="submit" class="btn btn-primary btn-block">حفظ التغيرات</button>            
        
        
        </div>

        </form>
    
    

</div>
</div>




