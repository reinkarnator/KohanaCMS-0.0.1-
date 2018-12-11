  
	<div class="contacts-form">
		<h2>{__("Заполните пожалуйста форму, и мы вам перезвоним!",NULL)}</h2>	
		<span><strong>*</strong>{__("Fields",NULL)}</span>
		<form id="sendctform" method="POST">
			<strong style="color:red;">*</strong><input type="input" required name="firstname" placeholder="{__('Ф.И.О',NULL)}" />
			<strong style="color:red;">*</strong><input type='tel' required name="phone" placeholder="{__('Телефон',NULL)}" />
			<strong style="color:red;">*</strong><input type="email" required name="email" placeholder="E-mail" />
			<input type="input" name="company" placeholder="{__('Компания',NULL)}" />
			<textarea name="comment" cols="30" rows="10" placeholder="{__('Комментарий',NULL)}"></textarea>
			<button id="proceedform">{__('Отправить',NULL)}</button>
		</form>
	</div>
