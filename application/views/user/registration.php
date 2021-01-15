<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Регистрация пользователя</div>
        <div class="card-body">
            <form action="/registration" method="post">
                <div class="form-group">
                    <label>Логин</label>
                    <input class="form-control" type="text" name="login">
                </div>
                <div class="form-group">
                    <label>Пароль</label>
                    <input class="form-control" type="password" name="password">
                </div>
                <div class="form-group">
                    <label>Подтвердите пароль</label>
                    <input class="form-control" type="password" name="confirm_password">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" name="email">
                </div>
                <div class="form-group">
                    <label>Ваше имя</label>
                    <input class="form-control" type="text" name="name">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Регистрация</button>
            </form>
        </div>
    </div>
</div>
