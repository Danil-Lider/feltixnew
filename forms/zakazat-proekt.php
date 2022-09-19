<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Заказатьт проект");
?>

<div class="container" style="margin-top: 5rem;">

	
 <form class="modal__form form-query" method="get" action="/form/">
   <input type="hidden" name="modal-name" value="заказать проект">
   <div class="modal__title">
      заказать проект
   </div>
   <div class="modal__field">

   		<div class="form__label mt30">
            <input type="text" required name="email" placeholder="email" value="">
        </div>

        <div class="form__label mt30">
            <input type="text" required name="name" placeholder="ФИО" value="">
        </div>

        <div class="form__label mt30">
         	<textarea class="input textarea" name="comment" id="" cols="30" rows="10" placeholder="Сообщение"></textarea>
        </div>

        
    
   </div>
   <div class="modal__btn">
      <button class="btn btn-blue" type="submit">Отправить</button>
   </div>
</form>


 <div class="modal__thanks" style="display: none;">
    <div class="modal__thanks-title">Благодарим за заявку!</div>
    <div class="modal__thanks-text">
       В течение 15 минут с Вами свяжется наш менеджер.
    </div>
</div>


</div>


<script type="text/javascript">

	$('.form-query').submit(function(e) {

        e.preventDefault(); 
        var $form = $(this);

        $.ajax({
            type: $form.attr('method'),
            cache: false,
            dataType: 'json',
            data: $form.serialize(),
            url: '/form/',
            success: function(msg) {

                $form.hide();
                $form.siblings('.modal__thanks').show();

            }
        });

    });
</script>



<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>