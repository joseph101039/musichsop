<div class="profile">

<?php
    $user = auth()->user();
?>
    <p class="text-profile">User Name: {{  $user['name'] }}</p>
    <p class="text-profile">E-mail: {{  $user['email'] }}</p>
    <p class="text-profile">Gender: {{($user['gender']?'female':'male') }}</p>
    <p class="text-profile"> Account create at: {{ $user['created_at']->format('Y/m/d')   }}</p>
    <p class="text-profile"> Last time update password:  {{  $user['updated_at']->format('Y/m/d')   }}</p>
    <p class="text-profile">
        <a class="link-profile" href="/changePassword">              
        Reset Password
        </a>
               
    </p>

</div>
