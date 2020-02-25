<ul class="nav nav-pills">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
           aria-expanded="false">Сортировать по имени</a>
        <div class="dropdown-menu">
            <a class="dropdown-item mb-2" href="/?sort=name&desc=0">Прямой порядок</a>
            <a class="dropdown-item mb-2" href="/?sort=name&desc=1">Обратный порядок</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
           aria-expanded="false">Сортировать по email</a>
        <div class="dropdown-menu">
            <a class="dropdown-item mb-2" href="/?sort=email&desc=0">Прямой порядок</a>
            <a class="dropdown-item mb-2" href="/?sort=email&desc=1">Обратный порядок</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
           aria-expanded="false">Сортировать по статусу</a>
        <div class="dropdown-menu">
            <a class="dropdown-item mb-2" href="/?sort=status&desc=1">Сначала выполненные</a>
            <a class="dropdown-item mb-2" href="/?sort=status&desc=0">Сначала не выполненные</a>
        </div>
    </li>
</ul>

<div style="margin-top: 3em">
    <table class="table table-hover">
        <thead class="thead-light">
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Task</th>
            <th scope="col">Статус</th>
            <th scope="col">Отредактировано</th>
            <? if (isset($_SESSION['user'])): ?>
            <th scope="col">Действия</th>
            <?endif;?>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($tasks as $task): ?>
            <tr>
                <th scope="row"><?= $task->name ?></th>
                <td><?= $task->email ?></td>
                <? if (isset($_SESSION['user'])): ?>
                    <td><input class="form-control task-body" type="text" data-id="<?=$task->id?>" value="<?= $task->body?>"></td>
                <? else: ?>
                    <td><?= $task->body ?></td>
                <? endif; ?>
                <td><?= $task->status ? 'Выполнено' : 'Не выполнено' ?></td>
                <td class="task-edited"><?= $task->edited ? 'Да' : 'Нет' ?></td>
                <? if (isset($_SESSION['user'])): ?>
                    <td><input class="task-checkbox" type="checkbox" name="status" value="<?=$task->id?>" <?= $task->status == '1' ? "checked" : '' ?>> Выполнено</td>
                <? endif; ?>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
    <div class="text-center">
        <? if($pagination->countPages > 1):?>
        <?= $pagination ?>
        <?endif;?>
    </div>

    <div class="mt-2">
        <h4>Новая задача:</h4>
        <form method="post" action="/tasks/add">
            <div class="form-group">
                <label for="name">Имя</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Введите имя" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="example@mail.ru" required>
            </div>

            <div class="form-group">
                <label for="body">Текст задачи</label>
                <textarea class="form-control" id="body" rows="3" name="body" required></textarea>
            </div>
            <input class="btn btn-primary" type="submit" value="Создать">
        </form>
    </div>
</div>