<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <br>
                <form class="form-signin" name = "signin_form">
                    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
                    <label for="inputEmail" class="sr-only">Email address</label>
                    <input name = "email" type = "text" class="form-control" placeholder="Email address" autofocus>
                    <br>
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input name = "password" type = "password" class="form-control" placeholder="Password" autofocus>
                    <br>
                    <a class="btn btn-lg btn-primary btn-block" name = "signin_button">Sign in</a>
                </form>
                <div style="color: red;text-align: center; "><small id = "error"></small></div>
                <div style="text-align: center;" id = "loading">
                    <p class="visually-hidden">Redirecting...</p>
                    <div class="spinner-border" role="status"></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import $ from 'jquery'
export default {
    mounted() {
        $('div#loading').hide();
        $('a[name="signin_button"]').on('click', ()=>{
            $('small#error').text("");
            $.ajax({
                url: "/signin",
                data: $('form[name="signin_form"]').serialize(),
                success: (e) => {
                    $('div#loading').show();
                    location.reload(); 
                },
                error: (e)=> {
                    console.log(e);
                    $('small#error').text(e.responseJSON.errors.login_error[0]);
                }
            });
        });
        
    }
}
</script>
