<html>
    <head>
    </head>
    <body>
        <form action="sign_up_process.php" method="POST">
            <div class="mb-3 ">
                <label">아이디</label>
                <input type="text" name="id" class="form-control" id="id" placeholder="아이디를 입력해">
            </div>
            <div class="mb-3 ">
                <label for="email" class="form-label">이메일</label>
                <input type="email" name="email" placeholder="이메일을 입력">
            </div>
            <div class="mb-3 ">
                <label for="password" class="form-label">비밀번호</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="비밀번호를 입력해 주세요.">
            </div>
            <button>가입하기</button>
        </form>
    </body>
</html>