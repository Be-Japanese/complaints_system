<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Add Complaint</title>

</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50">
<div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
    <form id="fs-frm" name="complaint-form" accept-charset="utf-8" action="https://formspree.io/f/{form_id}" method="post">
        <fieldset id="fs-frm-inputs">
            <label for="full-name">Full Name</label>
            <input type="text" name="name" id="full-name" placeholder="First and Last" required="">
            <label for="email-address">Email Address</label>
            <input type="email" name="_replyto" id="email-address" placeholder="email@domain.tld" required="">
            <label for="telephone">Telephone Number (Optional)</label>
            <input type="telephone" name="telephone" id="telephone" placeholder="(555) 555-5555">
            <label for="complaint">Complaint</label>
            <textarea rows="6" name="complaint" id="complaint" placeholder="Aenean lacinia bibendum nulla sed consectetur. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Donec ullamcorper nulla non metus auctor fringilla nullam quis risus." required=""></textarea>
            <input type="hidden" name="_subject" id="email-subject" value="Complaint Form Submission">
        </fieldset>
        <input type="submit" value="File Complaint">
    </form>
</div>
</body>
</html>
