@extends('homepage::layouts.layout')
<link rel="stylesheet" media="screen, print" href="/NewSmartAdmin/css/formplugins/select2/select2.bundle.css">
<link rel="stylesheet" media="screen, print" href="/NewSmartAdmin/css/vendors.bundle.css">
<link rel="stylesheet" media="screen, print" href="/NewSmartAdmin/css/app.bundle.css">
<!-- Place favicon.ico in the root directory -->
<link rel="apple-touch-icon" sizes="180x180" href="/NewSmartAdmin/img/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/NewSmartAdmin/img/favicon/favicon-32x32.png">
<link rel="mask-icon" href="/NewSmartAdmin/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
<!-- DEMO related CSS below -->
<link rel="stylesheet" media="screen, print" href="/NewSmartAdmin/css/fa-brands.css">
@section('content')
<style>

  .block_main_categories {
    width: 24%;
    height: 350px;
    border: 1px solid #0000cc;
    overflow-y: auto;
    display: inline-block;
  }
  .cat_block {
    padding: 10px 15px;
  }

  .select2-search {
    display: block;
  }

  .select2-container--default .select2-selection--multiple{
    border-radius: 20px;
  }

  .select2-container--default .select2-selection--multiple .select2-container--open{
   border-radius: 20px !important;
  }
</style>
  <article class="add_advert_block">
    <span data-status_created="{{session('infoAd')}}" id="statusAd"></span>
    <form action="{{route('web_ad_store')}}" method="post" enctype="multipart/form-data">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ul class="breadcrumbs">
            <li><a href="index.html"><img src="/img/home_icon.svg" alt=""></a><img src="/img/back_Icon.svg" alt=""></li>
            <li>Подать новое обьявление</li>
          </ul>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <h5 class="add_advert_block_title">
            Подать новое обьявление
          </h5>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="add_advert_block_wrapper">
            <h6 class="add_advert_block_wrapper_title">
              Заголовок
            </h6>
            <div class="add_advert_block_input1">
              <input type="text" name="name_ad" maxlength="70" placeholder="Название объявления" required value="{{old('name_ad')}}">
              <span class="required">*</span>
              @error('name_ad')
              <div class="alert errorBlock">{{ $message }}</div>
              @enderror
              <p class="number_of_signs"><span>70</span> знаков остается</p>
            </div>
            <div class="add_advert_block_input1">
              <input type="text" name="category_ads" placeholder="Выберите категорию" class="select_category" required readonly>
              <img src="/img/ipagination_right.svg" alt="">
              <span class="required">*</span>
              @error('category_id')
                <div class="alert errorBlock">{{ $message }}</div>
              @enderror
            </div>
            <div class="add_second_chat_block_input1" style="margin-top:40px">
              <div class="form-group" style="width:60%">
                <select class="select2-placeholder-multiple form-control"  multiple="multiple" id="multiple-placeholder">
                  <optgroup label="Такси Ливерпуля">
                    <option value="AK">Такси близ Аэропорта Ливерпуль</option>
                    <option value="HI">Такси Центр Ливерпуль</option>
                  </optgroup>
                  <optgroup label="Заказ пасажирских перевозок">
                    <option value="CA">Перевозки микроавтобусом</option>
                    <option value="NV">Перевозки групп от 10человек</option>
                  </optgroup>

                </select>
              </div>
            </div>

          </div>
        </div>
        <input type="hidden" id="category_id" name="category_id" value="{{old('category_id')}}">
        <div class="col-sm-12">
          <div class="add_advert_block_wrapper">
            <h6 class="add_advert_block_wrapper_title">
              Местополежение
            </h6>
            <div class="hide_location_radio">
              <input type="radio" name="hide_location" value="1" id="hide_location" checked="">
              <label for="hide_location">Показывать</label>
              <input type="radio" name="hide_location" value="Не показывать" id="no_hide_location">
              <label for="no_hide_location">Не показывать</label>
            </div>
            <div class="select_location_block">
              <input type="radio" name="select_addres" value="Полыний адрес" id="all_adress" checked="">
              <label for="all_adress">Полыний адрес</label>
              <input type="radio" name="select_addres" value="Только Postcode" id="postcode">
              <label for="postcode">Только Postcode</label>
              <input type="radio" name="select_addres" value="Выбрать местоположение" id="select_adress">
              <label for="select_adress">Выбрать местоположение</label>
              <input type="radio" name="select_addres" value="Вне UK" id="out_uk">
              <label for="out_uk">Вне UK</label>
            </div>
            <div class="postcode_block" style="display:none">
              <input type="text" name="post_code" placeholder="Postcode" class="add_advert_input_location postcode InputControl" id="clntInfoEditZip" required value="{{old('post_code')}}">
              @error('post_code')
              <div class="alert errorBlock">{{ $message }}</div>
              @enderror
            </div>
            <div class="all_user_block">
              <input type="text" name="address" placeholder="Адрес" class="add_advert_input_location InputControl" id="clntInfoEditAddr1" required value="{{old('address')}}">
              @error('address')
              <div class="alert errorBlock">{{ $message }}</div>
              @enderror
              <input type="text" name="post_code" placeholder="Postcode" class="add_advert_input_location postcode InputControl" id="clntInfoEditZip" required value="{{old('post_code')}}">
              @error('post_code')
              <div class="alert errorBlock">{{ $message }}</div>
              @enderror
            </div>
            <div class="outUk" style="display:none">
              <input type="text" name="address" placeholder="Страна" class="add_advert_input_location InputControl" id="clntInfoEditAddrOutUk1" required value="{{old('address')}}">
              @error('address')
              <div class="alert errorBlock">{{ $message }}</div>
              @enderror
              <input type="text" name="post_code" placeholder="Город" class="add_advert_input_location postcode InputControl" id="clntInfoEditOutUk" required value="{{old('post_code')}}">
              @error('post_code')
              <div class="alert errorBlock">{{ $message }}</div>
              @enderror
            </div>

            <div class="Places" style="display:none">

              <div class="form-group col-sm-12">

                <label class="control-label" style="display:block;">Категория в
                  каталоге*</label>
                <input type="hidden" name="id_cat">
                <input type="hidden" name="model_id" value="{{null}}">
                <input type="text" class="col-sm-11 control-label cat_name required"
                       style="font-size:17px;">

              </div>


              <div class="form-group col-sm-12 categories">

                @if($locations!==null)
                  <div class="block_main_categories cat_block_1" style="">
                    @foreach ($locations as $key=>$location)
                      @if($location->parent_id==0)
                        <a>
                          <div class="cat_block">
                            <input type="hidden" value="{{$location->id}}">
                            {{$location->name}}

                            <span class="fa arrow"
                                  style="float:right"></span>
                          </div>
                        </a>
                      @endif
                    @endforeach

                  </div>
                  <div class="block_main_categories cat_block_2">


                  </div>
                  <div class="block_main_categories cat_block_3">


                  </div>
                  <div class="block_main_categories cat_block_4">


                  </div>

                @else
                  <div style="width:100%;height:100px;color:#fff;background:red;text-align:center">

                    <h3>У вас не выбраны категории товаров для использования в вашем
                      интернет магазине </h3>
                    <a href="/admin/menu_areas">Перейти для выбора категорий</a>
                  </div>
                @endif
              </div>

            </div>
            <div class="place_in_UK" style="display:none">
              <input type="text" name="address" placeholder="Страна" class="add_advert_input_location InputControl" id="clntInfoEditAddrOutUk1" required value="{{old('address')}}">
              @error('address')
              <div class="alert errorBlock">{{ $message }}</div>
              @enderror
              <input type="text" name="post_code" placeholder="Город" class="add_advert_input_location postcode InputControl" id="clntInfoEditOutUk" required value="{{old('post_code')}}">
              @error('post_code')
              <div class="alert errorBlock">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>
        <div class="col-sm-12">
          <div class="add_advert_block_wrapper">
            <h6 class="add_advert_block_wrapper_title">
              Контактная информация
            </h6><br>
            <div class="contact_info_wrapper">
              <p>Email для сообщений (скрыт)</p>
              <input type="email" name="email" placeholder="Email" required value="{{old('email')}}">
              @error('email')
              <div class="alert errorBlock">{{ $message }}</div>
              @enderror
            </div>
            <div class="contact_info_wrapper contact_info_wrapper2">
              <div class="hide_phone_radio">
                <input type="radio" name="hide_phone" value="Показывать" id="hide_phone1" checked>
                <label for="hide_phone1">Показывать</label>
                <input type="radio" name="hide_phone" value="Не показывать" id="no_hide_phone1">
                <label for="no_hide_phone1">Не показывать</label>
              </div>
              <input type="tel" id="telphone2" name="phone" required value="{{old('phone')}}">
              @error('email')
              <div class="alert errorBlock">{{ $message }}</div>
              @enderror
            </div>
            <div class="contact_info_wrapper">
              <div class="hide_phone_radio">
                <input type="radio" name="hide_name" value="1" id="hide_name" checked>
                <label for="hide_name">Показывать</label>
                <input type="radio" name="hide_name" value="Не показывать" id="no_hide_name">
                <label for="no_hide_name">Не показывать</label>
              </div>
              <input type="text" name="name" placeholder="Имя" required value="{{old('name')}}">
              @error('name')
              <div class="alert errorBlock">{{ $message }}</div>
              @enderror
            </div>
            <div class="contact_info_wrapper">
              <div class="input_price_icon">£</div><input type="text" name="price" placeholder="Цена (необезательно)" value="{{old('price')}}">
            </div>
          </div>
        </div>
        <div class="col-sm-12">
          <div class="add_advert_block_wrapper">
            <h6 class="add_advert_block_wrapper_title">
              Фотографии
            </h6>
            <div class="add_foto_file_wrapper">
              <div class="add_foto_file_item">

                <div class="upload-file-container-text">

                  <label for="imgInput" class="add_foto_file_item_load">
                    <img src="/img/photo-camera-icon.svg" alt="">
                    <span>Добавить фото</span>
                  </label>
                  <div class="add_foto_file_img_wrapper">
                    <img  src="#" alt="" class="add_foto_file_img" />
                    <div class="add_foto_file_block_hover">
                      <label for="imgInput" class="add_foto_file_item_load2">
                        <img src="/img/refresh_icon.svg" alt="">
                      </label>
                      <div class="add_foto_file_delete">
                        <img src="/img/delete-icon.svg" alt="">
                      </div>
                    </div>
                  </div>
                  <input type="file" name="files[]" class="photo" id="imgInput"/>
                </div>
              </div>
              <div class="add_foto_file_item">
                <div class="upload-file-container-text">

                  <label for="imgInput2" class="add_foto_file_item_load">
                    <img src="/img/photo-camera-icon.svg" alt="">
                    <span>Добавить фото</span>
                  </label>
                  <div class="add_foto_file_img_wrapper">
                    <img  src="#" alt="" class="add_foto_file_img" />
                    <div class="add_foto_file_block_hover">
                      <label for="imgInput2" class="add_foto_file_item_load2">
                        <img src="/img/refresh_icon.svg" alt="">
                      </label>
                      <div class="add_foto_file_delete">
                        <img src="/img/delete-icon.svg" alt="">
                      </div>
                    </div>
                  </div>
                  <input type="file" name="files[]" class="photo" id="imgInput2"/>
                </div>
              </div>
              <div class="add_foto_file_item">
                <div class="upload-file-container-text">

                  <label for="imgInput3" class="add_foto_file_item_load">
                    <img src="/img/photo-camera-icon.svg" alt="">
                    <span>Добавить фото</span>
                  </label>
                  <div class="add_foto_file_img_wrapper">
                    <img  src="#" alt="" class="add_foto_file_img" />
                    <div class="add_foto_file_block_hover">
                      <label for="imgInput3" class="add_foto_file_item_load2">
                        <img src="/img/refresh_icon.svg" alt="">
                      </label>
                      <div class="add_foto_file_delete">
                        <img src="/img/delete-icon.svg" alt="">
                      </div>
                    </div>
                  </div>
                  <input type="file" name="files[]" class="photo" id="imgInput3"/>
                </div>
              </div>
              <div class="add_foto_file_item">
                <div class="upload-file-container-text">
                  <label for="imgInput4" class="add_foto_file_item_load">
                    <img src="/img/photo-camera-icon.svg" alt="">
                    <span>Добавить фото</span>
                  </label>
                  <div class="add_foto_file_img_wrapper">
                    <img  src="#" alt="" class="add_foto_file_img" />
                    <div class="add_foto_file_block_hover">
                      <label for="imgInput4" class="add_foto_file_item_load2">
                        <img src="/img/refresh_icon.svg" alt="">
                      </label>
                      <div class="add_foto_file_delete">
                        <img src="/img/delete-icon.svg" alt="">
                      </div>
                    </div>
                  </div>
                  <input type="file" name="files[]" class="photo" id="imgInput4"/>
                </div>
              </div>
              <div class="add_foto_file_item">
                <div class="upload-file-container-text">
                  <label for="imgInput5" class="add_foto_file_item_load">
                    <img src="/img/photo-camera-icon.svg" alt="">
                    <span>Добавить фото</span>
                  </label>
                  <div class="add_foto_file_img_wrapper">
                    <img  src="#" alt="" class="add_foto_file_img" />
                    <div class="add_foto_file_block_hover">
                      <label for="imgInput5" class="add_foto_file_item_load2">
                        <img src="/img/refresh_icon.svg" alt="">
                      </label>
                      <div class="add_foto_file_delete">
                        <img src="/img/delete-icon.svg" alt="">
                      </div>
                    </div>
                  </div>
                  <input type="file" name="files[]" class="photo" id="imgInput5"/>
                </div>
              </div>
              <div class="add_foto_file_item">
                <div class="upload-file-container-text">
                  <label for="imgInput6" class="add_foto_file_item_load">
                    <img src="/img/photo-camera-icon.svg" alt="">
                    <span>Добавить фото</span>
                  </label>
                  <div class="add_foto_file_img_wrapper">
                    <img  src="#" alt="" class="add_foto_file_img" />
                    <div class="add_foto_file_block_hover">
                      <label for="imgInput6" class="add_foto_file_item_load2">
                        <img src="img/refresh_icon.svg" alt="">
                      </label>
                      <div class="add_foto_file_delete">
                        <img src="/img/delete-icon.svg" alt="">
                      </div>
                    </div>
                  </div>
                  <input type="file" name="files[]" class="photo" id="imgInput6"/>
                </div>
              </div>
              <div class="add_foto_file_item">
                <div class="upload-file-container-text">
                  <label for="imgInput7" class="add_foto_file_item_load">
                    <img src="/img/photo-camera-icon.svg" alt="">
                    <span>Добавить фото</span>
                  </label>
                  <div class="add_foto_file_img_wrapper">
                    <img  src="#" alt="" class="add_foto_file_img" />
                    <div class="add_foto_file_block_hover">
                      <label for="imgInput2" class="add_foto_file_item_load2">
                        <img src="/img/refresh_icon.svg" alt="">
                      </label>
                      <div class="add_foto_file_delete">
                        <img src="/img/delete-icon.svg" alt="">
                      </div>
                    </div>
                  </div>
                  <input type="file" name="files[]" class="photo" id="imgInput7"/>
                </div>
              </div>
              <div class="add_foto_file_item">
                <div class="upload-file-container-text">
                  <label for="imgInput8" class="add_foto_file_item_load">
                    <img src="/img/photo-camera-icon.svg" alt="">
                    <span>Добавить фото</span>
                  </label>
                  <div class="add_foto_file_img_wrapper">
                    <img  src="#" alt="" class="add_foto_file_img" />
                    <div class="add_foto_file_block_hover">
                      <label for="imgInput8" class="add_foto_file_item_load2">
                        <img src="/img/refresh_icon.svg" alt="">
                      </label>
                      <div class="add_foto_file_delete">
                        <img src="/img/delete-icon.svg" alt="">
                      </div>
                    </div>
                  </div>
                  <input type="file" name="files[]" class="photo" id="imgInput8"/>
                </div>
              </div>
              <div class="add_foto_file_item">
                <div class="upload-file-container-text">

                  <label for="imgInput9" class="add_foto_file_item_load">
                    <img src="/img/photo-camera-icon.svg" alt="">
                    <span>Добавить фото</span>
                  </label>
                  <div class="add_foto_file_img_wrapper">
                    <img  src="#" alt="" class="add_foto_file_img" />
                    <div class="add_foto_file_block_hover">
                      <label for="imgInput9" class="add_foto_file_item_load2">
                        <img src="/img/refresh_icon.svg" alt="">
                      </label>
                      <div class="add_foto_file_delete">
                        <img src="/img/delete-icon.svg" alt="">
                      </div>
                    </div>
                  </div>
                  <input type="file" name="files[]" class="photo" id="imgInput9"/>
                </div>
              </div>
              <div class="add_foto_file_item">
                <div class="upload-file-container-text">

                  <label for="imgInput10" class="add_foto_file_item_load">
                    <img src="/img/photo-camera-icon.svg" alt="">
                    <span>Добавить фото</span>
                  </label>
                  <div class="add_foto_file_img_wrapper">
                    <img  src="#" alt="" class="add_foto_file_img" />
                    <div class="add_foto_file_block_hover">
                      <label for="imgInput10" class="add_foto_file_item_load2">
                        <img src="/img/refresh_icon.svg" alt="">
                      </label>
                      <div class="add_foto_file_delete">
                        <img src="/img/delete-icon.svg" alt="">
                      </div>
                    </div>
                  </div>
                  <input type="file" name="files[]" class="photo" id="imgInput10"/>
                </div>
              </div>
            </div>
            <a href="#" class="add_advert_rolls_foto">Привила добавления фото</a>
            @error('files')
            <div class="alert errorBlock">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="col-sm-12">
          <div class="add_advert_block_wrapper">
            <h6 class="add_advert_block_wrapper_title">
              Описание
            </h6>
            <div class="add_advert_desc">
              <p>Текст объявления: на русском языке. Допустимое использование английского не более 20%(термины, названия).</p>
              <p class="end">Транслит не допускается.</p>
              <textarea name="description" placeholder="Текст обьявления" required>{{old('description')}}</textarea>
              @error('description')
              <div class="alert errorBlock">{{ $message }}</div>
              @enderror
              <button type="submit" id="saveAdsButton">Подать обьявление</button>
              <button type="button" class="buttonHref">Предварительный просмотр</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
  </article>
  </div>
    <div class="modal fade modalCatalog" id="mainCatalog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <img src="/img/close-icon.svg" alt="">
                </button>

                <div class="row">
                    <div class="col-md-4 catalogBlock1">
                        <div class="number_block_category d-md-none">1/3</div>
                        <h5>Категория</h5>
                        <ul class="listCatalog listCatalog1">
                          @foreach($categoriesOnlyRoot as $category)
                            <li data-category_id="{{$category->id}}">{{$category->name}}</li>
                          @endforeach
                        </ul>
                    </div>
                    <div class="col-md-4 catalogBlock2">
                        <img src="/img/arrow_left.svg" alt="" class="arrow_left d-md-none">
                        <div class="number_block_category d-md-none">2/3</div>
                        <h5>Рубрика</h5>
                        <ul class="listCatalog listCatalog2">

                        </ul>
                    </div>
                    <div class="col-md-4 catalogBlock3">
                        <img src="/img/arrow_left.svg" alt="" class="arrow_left d-md-none">
                        <div class="number_block_category d-md-none">3/3</div>
                        <h5>Подрубрика</h5>
                        <ul class="listCatalog listCatalog3 listCatalogEnd">

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
@section('scripts')
  <script src="/NewSmartAdmin/js/formplugins/select2/select2.bundle.js"></script>

<script>


    $(document).ready(function() {
        $(function () {

            $(".select2-placeholder-multiple").select2(
                {
                    placeholder: "Select State"
                });
        });

    });


    $('.categories').delegate('.cat_block','click',function(){
console.log()
        var id_cat = $(this).parent('a').find('input').val()
        var cl=$(this).parent('a').parent().attr('class');
        cl=cl.split(' ')[1]
        var simbol=parseInt(cl.slice(10))+1
        new_block_cl=cl.slice(0, 10)+simbol

        $.ajax({
            type: "POST",
            dataType: 'json',
            async: false,
            url: '/show_subcat',
            data: {id_cat: id_cat,is_user:1}, // serializes the form's elements.
            success: function (data) {
                if(data.message=='null'){
                    //проверить чтобы соседние последующие блоки были пусты

                    $('input[name="id_cat"]').val(data.value.id)
                    $('.cat_name').val(data.value.info.name)
                    alert('меняется категория')
                    //достать все свойства категории и отобразить в блоке #properties Временно заремлена
                  /*                   $.ajax({
                   type: "POST",
                   dataType: 'json',
                   async: false,
                   url: '/show_property_by_category',
                   data: {id_cat: data.value.id},
                   success: function (dataprop) {
                   if(dataprop=='no_properties'){


                   }
                   else{
                   console.log(dataprop);
                   $('#properties').empty();
                   $.each( dataprop, function( k, prop ) {
                   $('#properties').append(' <div style="border-right:1px solid #000;border-left:1px solid #000" class="prop col-md-3" >' +
                   '<input type="hidden" value="'+prop.id+'">' +
                   ' <div><h3 style="text-align:center;margin-top:10px;">'+prop.name+'</h3></div>'
                   +'<div id="prop_datas_'+k+'" class=""></div>'+
                   '</div>')

                   $.each( prop.data, function( v, dat ) {
                   $('#prop_datas_'+k).append('<div><div class="i-checks"><label><input type="radio" value="'+dat.id+'" name="property['+prop.id+'][]"> <i></i> '+dat.data+'</label></div></div>');
                   });


                   $('.i-checks').iCheck({
                   checkboxClass: 'icheckbox_square-green',
                   radioClass: 'iradio_square-green',
                   });
                   });
                   }
                   }

                   });*/


                    //если (data.value.info.parent_num) ==2
                    //удалить 3,4
                    // если (data.value.info.parent_num) ==3
                    //4
                    if(data.value.info.parent_num==2){
                        $('.cat_block_3').empty();
                        $('.cat_block_4').empty();
                    }
                    else if(data.value.info.parent_num==3){
                        $('.cat_block_4').empty();
                    }

                }
                else{
                    $('.'+new_block_cl+'').empty();
                    switch(new_block_cl){
                        case 'cat_block_2':
                            $('.cat_block_3').empty();
                            $('.cat_block_4').empty();
                            break;
                        case 'cat_block_3':
                            $('.cat_block_4').empty();
                            break;

                    }
                    $.each( data.value, function( key, value ) {
                        $('.'+new_block_cl+'').append(' <a ><div class="cat_block" >' +
                            '<input type="hidden" value="'+value.id+'">' +
                            value.name+
                            '<span class="fa arrow" style="float:right"></span>' +
                            '</div></a>')
                    });

                }}

        });




    });
</script>
  @endsection

