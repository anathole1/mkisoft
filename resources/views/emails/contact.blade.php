<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CBO Ingenzi-Mails</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="max-w-lg rounded shadow-lg border border-blue-500 mx-auto mt-4">
        <div class="text-white bg-gradient-to-bl from-teal-400 to-blue-500 items-center text-lg text-center py-4 font-normal font-serif">New Email from CBO Ingenzi Website</div>
        <div class="px-6 py-4 font-sans">
            <span class="text-teal-500">Names:</span><h2 class="font-semibold text-md mb-2"> {{$user->names}} </h2>
            <span class="text-teal-500">Email:</span><p class="text-blue-600 text-base mb-2"> <a>{{$user->email}} </a> </p>
            <span class="text-teal-500">Subject:</span><p class="leading-normal mb-2"> {{$user->subject}} </p>
            <span class="text-teal-500">Message:</span><p class="text-gray-700 leading-relaxed tracking-tight">{{$user->message}}

        </div>
    </div>
</body>
</html>
