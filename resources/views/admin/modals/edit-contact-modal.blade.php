<div id="edit-card-modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="edit-contact-form" action="#" method="get">
                <div class="modal-header">
                    <h5 class="modal-title">Редактирование карточки</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="inputAddress">Название:</label>
                        <input type="text" class="form-control" name="name" required placeholder="Отель 'Мариот'">
                    </div>
                    <div class="form-group mt-10">
                        <label for="inputAddress">Телефон:</label>
                        <input type="text" class="form-control" name="phone" placeholder="+78005553535">
                    </div>
                    <div class="form-group mt-10">
                        <label for="inputAddress">Почта:</label>
                        <input type="text" class="form-control" name="email" placeholder="hotel@example.com">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Ссылка:</label>
                        <input type="text" class="form-control" name="url" placeholder="https://google.com">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Статус:</label>
                        <select name="status" class="form-control">
                            <option value="0">Не звонили</option>
                            <option value="1">Скинуть КП</option>
                            <option value="2">Перезвонить</option>
                            <option value="3">Ждать звонка</option>
                            <option value="4">Долгий ящик</option>
                            <option value="5">Обработан</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Заметка:</label>
                        <textarea class="form-control" name="desc" rows="5" placeholder="Перезвонить в 12:00"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="inputAddress">Дата добавления:</label>
                        <input type="text" class="form-control" name="created_at" value="" disabled>
                    </div>

                    @csrf
                    @method('post')

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                    <button id="edit-contact-button" type="button" class="btn btn-primary">Сохранить</button>
                </div>
            </form>

        </div>
    </div>
</div>
