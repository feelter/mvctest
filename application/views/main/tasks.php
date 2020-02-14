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
                                    <th><a href="/">ID</a></th>								
                                    <th>Имя <a href="/main/tasks-nameasc/"><span class="fa fa-fw fa-search-plus"></span></a> <a href="/main/tasks-name/"><i class="fa fa-fw fa-search-minus"></i></a> </th>
                                    <th>Email <a href="/main/tasks-emailasc/"><span class="fa fa-fw fa-search-plus"></span></a> <a href="/main/tasks-email/"><i class="fa fa-fw fa-search-minus"></i></a> </th>
                                    <th>Текст задачи</th>
                                    <th>Статус <a href="/main/tasks-status/"><span class="fa fa-fw fa-search-plus"></span></a> <a href="/main/tasks-statusasc/"><i class="fa fa-fw fa-search-minus"></i></a> </th>
                                </tr>
                                <?php foreach ($list as $val): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($val['id'], ENT_QUOTES); ?></td>
                                        <td><?php echo htmlspecialchars($val['name'], ENT_QUOTES); ?></td>
										<td><?php echo htmlspecialchars($val['email'], ENT_QUOTES); ?></td>
										<td><?php echo htmlspecialchars($val['description'], ENT_QUOTES); ?></td>
										<td><?php if ($val['status']>0) echo 'выполнено<br>'; if ($val['edit']>0) echo 'отредактировано администратором'; ?></td>
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