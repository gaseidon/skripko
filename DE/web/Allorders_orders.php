<? foreach ($stmt as $item): ?>

    <div class="order_block" data-status="<?= $item['status'] ?>">
        <div class="full_name">
            <? foreach ($users as $user):
                if ($user['id'] == $item['user_id']): ?>
                    ФИО покупателя:
                    <?= $user['name'] ?>
                    <?= $user['surname'] ?>
                    <?= $user['patronymic'] ?>
                <? endif;
            endforeach; ?>
        </div>
        <div class="created_at">
            Время создания заказа:
            <?= $item['created_at'] ?>
        </div>
        <div class="order_detail">
            <?= $item['order_detail'] ?>
        </div>
        <div class="order_status">
            <?= $item['status'] ?>
        </div>
        <? if ($item['status'] == 'Новый'): ?>
            <form class="form" onsubmit="return false" method="post">

                <input data-id="<?= $item['order_id'] ?>" class="order_del" type="submit" value="Удалить">
                <input class="order_change" type="submit" value="Изменить статус">
                <select class="hide" name="status_change" id="status_change">
                    <option id="confirm" value="Умолч">Выберите статус</option>
                    <option id="confirm" value="Подтверждён">Подтверждён</option>
                    <option id="decline" value="Отклонён">Отклонён</option>
                </select>
                <textarea class="hide" name="reason" id="reason_text" cols="30" rows="5"></textarea>
                <input data-id="<?= $item['order_id'] ?>" id="last_confirm" class="hide last_confirm" type="submit"
                    value="Подтвердить">

            </form>
        <? endif; ?>
    </div>

<? endforeach ?>