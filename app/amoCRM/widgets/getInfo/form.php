
<div class="uk-container uk-width-1-1">
		<form action="" method=""  class="uk-grid-small" uk-grid  uk-sticky>
			<fieldset class="uk-fieldset">
				<legend class="uk-legend">Select GET request API amoCRM:</legend>
				<div class="uk-inline">
					<div id="preloader" class="" hidden>
						<div class="uk-position-center">
							<span uk-spinner="ratio: .65"></span>
						</div>
					</div>
					<select id="selGET" class="uk-select uk-form-width-large ">
    					<option value="">выберите запрос...</option>
    					<option value="account">Параметры аккаунта</option>
						<option value="leads">Список сделок</option>
						<option value="leads/unsorted">Список неразобранного</option>
						<option value="leads/pipelines">Список воронок сделок</option>

						<option value="contacts">Список контактов</option>
						<option value="companies">Список компаний</option>

						<option value="catalogs">Доступные списки</option>
						<option value="tasks">Список задач</option>

						<option value="leads/custom_fields">Список custom полей сделки</option>
						<option value="contacts/custom_fields">Список custom полей контакта</option>
						<option value="companies/custom_fields">Список custom полей компании</option>

						<option value="customers/custom_fields">Список custom полей</option>
						<option value="customers/segments/custom_fields">Список сегментов custom полей</option>
						<option value="events">Список событий</option>
						<option value="events/types">Список типов событий</option>

						<option value="customers">Список покупателей</option>
						<option value="customers/transactions">Список транзакций покупателей</option>
						<option value="customers/statuses">Список статусов покупателей</option>
						<option value="customers/segments">Список сегментов покупателей</option>

						<option value="users">Список пользователей</option>
						<option value="roles">Список ролей пользователей</option>

						<option value="webhooks">Список вебхуков</option>

						<option value="widgets">Список виджетов</option>
    
						<option value="sources">Список источников</option>
						<option value="chats/templatesroles">Список шаблонов</option>
					</select>
				</div>
			</fieldset>
		</form> 
		<div class="uk-placeholder">

<!--div id="preloader"  hidden><span uk-spinner>...ждите</span></div-->

			<div id='outGet'>
			</div>
		</div>
		
</div>
