<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $output ?></title>
    <style>
        *,
::after,
::before {
  box-sizing: border-box;
}

body {
  background-color: #212121;
  color: #fff;
  font-family: monospace, serif;
  letter-spacing: 0.05em;
}

h1 {
  font-size: 23px;
}

.form {
  width: 300px;
  padding: 64px 15px 24px;
  margin: 0 auto;
}

.control {
  margin: 0 0 24px;
}

.control input {
  width: 100%;
  padding: 14px 16px;
  border: 0;
  background: transparent;
  color: #fff;
  font-family: monospace, serif;
  letter-spacing: 0.05em;
  font-size: 16px;
}

.control input:hover,
.control input:focus {
  outline: none;
  border: 0;
}

.btn {
  width: 100%;
  display: block;
  padding: 14px 16px;
  background: transparent;
  outline: none;
  border: 0;
  color: #fff;
  letter-spacing: 0.1em;
  font-weight: bold;
  font-family: monospace;
  font-size: 16px;
}

.block-cube {
  position: relative;
}

.bg-top {
  position: absolute;
  height: 10px;
  background: linear-gradient(
    90deg,
    rgba(2, 0, 36, 1) 0%,
    rgba(52, 9, 121, 1) 37%,
    rgba(0, 212, 255, 1) 94%
  );
  bottom: 100%;
  left: 5px;
  right: -5px;
  transform: skew(-45deg, 0);
  margin: 0;
}

.bg {
  position: absolute;
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
  background: linear-gradient(
    90deg,
    rgba(2, 0, 36, 1) 0%,
    rgba(52, 9, 121, 1) 37%,
    rgba(0, 212, 255, 1) 94%
  );
}

.bg-right {
  position: absolute;
  background: rgba(0, 212, 255, 1);
  top: -5px;
  z-index: 0;
  bottom: 5px;
  width: 10px;
  left: 100%;
  transform: skew(0, -45deg);
}

.bg-inner {
  position: absolute;
  left: 2px;
  top: 2px;
  right: 2px;
  bottom: 2px;
  background: rgba(33, 33, 33, 1); /* Assuming $bg_body is a dark color */
  transition: all 0.2s ease-in-out;
}

.text {
  position: relative;
  z-index: 2;
}

.block-input input {
  position: relative;
  z-index: 2;
}

.block-input input:focus ~ .bg-right .bg-inner,
.block-input input:focus ~ .bg-top .bg-inner,
.block-input input:focus ~ .bg-inner .bg-inner {
  top: 100%;
  background: rgba(255, 255, 255, 0.5);
}

.block-input .bg-top,
.block-input .bg-right,
.block-input .bg {
  background: rgba(255, 255, 255, 0.5);
  transition: background 0.2s ease-in-out;
}

.block-input .bg-right,
.block-input .bg-top {
  .bg-inner {
    transition: all 0.2s ease-in-out;
  }
}

.block-input:focus,
.block-input:hover {
  .bg-top,
  .bg-right,
  .bg {
    background: rgba(255, 255, 255, 0.8);
  }
}

.block-cube-hover:focus,
.block-cube-hover:hover {
  .bg .bg-inner {
    top: 100%;
  }
}

.credits {
  position: fixed;
  left: 0;
  bottom: 0;
  padding: 15px 15px;
  width: 100%;
  z-index: 111;
}

a {
  opacity: 0.6;
  color: #fff;
  font-size: 11px;
  text-decoration: none;
  &:hover {
    opacity: 1;
  }
}

    </style>
</head>

<body>
    <form autocomplete='off' class='form'>
        <div class='control'>
            <h1>
                Sign In
            </h1>
        </div>
        <div class='control block-cube block-input'>
            <input name='username' placeholder='Username' type='text'>
            <div class='bg-top'>
                <div class='bg-inner'></div>
            </div>
            <div class='bg-right'>
                <div class='bg-inner'></div>
            </div>
            <div class='bg'>
                <div class='bg-inner'></div>
            </div>
        </div>
        <div class='control block-cube block-input'>
            <input name='password' placeholder='Password' type='password'>
            <div class='bg-top'>
                <div class='bg-inner'></div>
            </div>
            <div class='bg-right'>
                <div class='bg-inner'></div>
            </div>
            <div class='bg'>
                <div class='bg-inner'></div>
            </div>
        </div>
        <button class='btn block-cube block-cube-hover' type='button'>
            <div class='bg-top'>
                <div class='bg-inner'></div>
            </div>
            <div class='bg-right'>
                <div class='bg-inner'></div>
            </div>
            <div class='bg'>
                <div class='bg-inner'></div>
            </div>
            <div class='text'>
                Log In
            </div>
        </button>
    </form>

</body>

</html>