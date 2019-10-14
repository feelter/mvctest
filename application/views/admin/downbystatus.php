<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header">ЗАДАЧИ</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-lg-12">
                        <?php if (empty($list)): ?>
                            <p>Список задач пуст</p>
                        <?php else: ?>
                            <table class="table">
                                <tr>
                                    <th><a href="/admin/tasks/">ID</a></th>								
                                    <th>Имя <a href="/admin/upbyname/"><span class="fa fa-fw fa-search-plus"></span></a> <a href="/admin/downbyname/"><i class="fa fa-fw fa-search-minus"></i></a> </th>
                                    <th>Email <a href="/admin/upbyemail/"><span class="fa fa-fw fa-search-plus"></span></a> <a href="/admin/downbyemail/"><i class="fa fa-fw fa-search-minus"></i></a> </th>
                                    <th>Текст задачи</th>
                                    <th>Статус <a href="/admin/upbystatus/"><span class="fa fa-fw fa-search-plus"></span></a> <a href="/admin/downbystatus/"><i class="fa fa-fw fa-search-minus"></i></a> </th>									
                                    <th>Редактировать</th>
                                    <th>Удалить</th>
                                </tr>
                                <?php foreach ($list as $val): ?>
                                    <tr>
                                        <td><?php echo $val['id']; ?></td>									
                                        <td><?php echo htmlspecialchars($val['name'], ENT_QUOTES); ?></td>
										<td><?php echo htmlspecialchars($val['email'], ENT_QUOTES); ?></td>
										<td><?php echo htmlspecialchars($val['description'], ENT_QUOTES); ?></td>
										<td><?php if ($val['status']>0) echo 'выполнено<br>'; if ($val['edit']>0) echo 'отредактировано администратором'; ?></td>
                                        <td><a href="/admin/edit/<?php echo $val['id']; ?>" class="btn btn-primary">Редактировать</a></td>
                                        <td><a href="/admin/delete/<?php echo $val['id']; ?>" class="btn btn-danger" onclick="return confirm('Подтверждаете удаление?') ? true : false;">Удалить</a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                            <?php echo $pagination; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>