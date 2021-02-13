<div class="container">


    <form action="/dataform" method="post" id=form>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" required>

        </div>
        <div class="input-group">
            <span class="input-group-text">Произвольный текст</span>
            <textarea class="form-control" aria-label="With textarea" name="text" required></textarea>
        </div>
        <div class="input-group mt-3">
            <button type="submit" class="btn btn-primary" id="btn-form">Отправить</button>
        </div>

    </form>

    <div class="result" id="resultForm">
    <h2></h2>
    </div>

</div>

