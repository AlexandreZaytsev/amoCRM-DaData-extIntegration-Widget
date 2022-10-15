
<div class="uk-container uk-width-1-1">
	<!--form action="../../amo/test.php" method="post"-->
	<form action="../../amo/setParty.php" method="post"> 
		<div class="uk-card uk-card-default uk-card-small">
    		<div class="uk-card-header uk-background-muted uk-padding-remove">
				<div class="uk-flex uk-flex-between uk-flex-middle" >
					<span class="uk-text-emphasis  uk-text-large">Создать Lead</span>
					<div class="uk-badge uk-label">РПК</div>
				</div>
                <div class="uk-margin-small-bottom uk-padding-remove">
            		<textarea class="uk-textarea uk-form-small" rows="1" name="lead" placeholder="Введите наименование Lead" required></textarea>
            	</div>
			</div>
			<div class="uk-card-body uk-padding-remove">

				<div class="uk-width-1-1 uk-panel uk-margin-small-top">
					<div class="uk-align-left uk-margin-small-left uk-margin-remove-bottom">Контрагент (сервис DaData)</div>
					<div>
					<ul class="uk-subnav uk-subnav-pill uk-margin-small-bottom" uk-switcher>
    					<li><a href="#">Plugin</a></li>
    					<li><a href="#">API</a></li>
					</ul>
					<ul class="uk-switcher ">
    					<li><input id="party_plugin" class="uk-input uk-form-success uk-form-small" type="text" placeholder="Введите название, ИНН, ОГРН или адрес организации"></li>
    					<li><input id="party_api" class="uk-input uk-form-success uk-form-small" type="text" placeholder="Введите название, ИНН, ОГРН или адрес организации)"  uk-tooltip="title: будет показано только первое значение; pos: top-right"></li>
					</ul>
					</div>
				</div>
				<hr class="uk-margin-small">
				<!--p id="type" class="uk-margin-remove-vertical"></p-->
				<div class="uk-width-1-1">
					<input id="name_short" class="uk-input  uk-form-small" name="name_short" type="text" placeholder="Краткое наименование" required>
				</div>
				<div class="">
					<textarea id="name_full" class="uk-textarea  uk-form-small" name="name_full" rows="1" placeholder="Полное наименование"></textarea>
				</div>
				<div class="uk-width-1-1">
					<input id="manager" class="uk-input  uk-form-small" type="text" name="manager" placeholder="Ген.директор">
				</div>
				<div class="uk-width-1-1">
					<input id="inn" class="uk-input  uk-form-small" type="text" name="inn" placeholder="ИНН">
				</div>
				<div class="uk-width-1-1">
					<input id="ogrn" class="uk-input uk-form-small" type="text" name="ogrn" placeholder="ОГРН">
				</div>
				<div class="uk-width-1-1">
					<textarea id="address" class="uk-textarea uk-form-small" rows="1" name="address" placeholder="Юридический адрес"></textarea>
				</div>
			</div>
			<div class="uk-card-footer uk-background-muted uk-padding-remove">
				<button class="uk-button uk-button-text" type="submit" >Добавить в amoCRM</button>
			</div>
		</div>
	</form>  
</div>
