<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><?php echo $title; ?></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <form action="/admin/edit/<?php echo $data['id']; ?>" method="post" >
                            <div class="form-group">
                                <label>Имя пользователя</label>
                                <input class="form-control" type="text" value="<?php echo htmlspecialchars($data['name'], ENT_QUOTES); ?>" name="name">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="text" value="<?php echo htmlspecialchars($data['email'], ENT_QUOTES); ?>" name="email">
                            </div>
                            <div class="form-group">
                                <label>Текст задачи</label>
                                <textarea class="form-control" rows="3" name="description"><?php echo htmlspecialchars($data['description'], ENT_QUOTES); ?></textarea>
                            </div>
			  <div class="form-check">
			    <label class="form-check-label">
			      <input type="checkbox" class="form-check-input" name="status" value="on" <?php if  ($data['status']==1) echo 'checked="checked"'; ?>>
			      Выполнено
			    </label>
			  </div>
                            <button type="submit" class="btn btn-primary btn-block">Сохранить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>