@extends('layouts.app')

@section('content')

<section class="bg-gradient-to-b from-[#1a1a1a] to-[#0a0a0a] py-24">

<div class="max-w-7xl mx-auto px-6">

<!-- TITLE -->
<div class="text-center mb-20">

<h1 class="text-5xl font-bold text-white mb-4"
style="font-family:'Playfair Display', serif;">
Meet Our Teams
</h1>

<p class="text-gray-400">
The team behind the Hotel Gunja digital experience
</p>

</div>


<!-- TEAM GRID -->
<div class="grid md:grid-cols-2 lg:grid-cols-4 gap-10">

<!-- CARD 1 -->
<div class="dev-card">

<img src="https://i.pravatar.cc/300?img=15"
class="dev-img">

<h3 class="dev-name">
Er. Pranaya Nakarmi
</h3>

<p class="dev-role">
Technology Head
</p>

<p class="dev-desc">
Head of Venture Four Technology guiding
technical direction of the project.
</p>

<div class="dev-socials">


<!-- LinkedIn -->
<a href="https://np.linkedin.com/company/venture4tech" target="_blank" class="dev-icon" aria-label="LinkedIn">
<svg viewBox="0 0 24 24" fill="currentColor">
<path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 1 0-4 0v7h-4v-12h4v2a4 4 0 0 1 2-3z"/>
<circle cx="4" cy="4" r="2"/>
<rect x="2" y="9" width="4" height="12"/>
</svg>
</a>

<!-- Email -->
<a href="mailto:mail@venture4tech.com" class="dev-icon" aria-label="Email">
<svg viewBox="0 0 24 24" fill="currentColor">
<path d="M22 6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6zm-2 0-8 5-8-5"/>
</svg>
</a>

<!-- Facebook -->
<a href="https://www.facebook.com/venture4tech/" target="_blank" class="dev-icon" aria-label="Facebook">
<svg viewBox="0 0 24 24" fill="currentColor">
<path d="M22 12.07C22 6.48 17.52 2 11.93 2S2 6.48 2 12.07c0 5.02 3.66 9.19 8.44 9.93v-7.02H8.08v-2.9h2.29V9.41c0-2.27 1.35-3.52 3.42-3.52.99 0 2.03.18 2.03.18v2.23h-1.14c-1.12 0-1.47.69-1.47 1.4v1.68h2.5l-.4 2.9h-2.1v7.02C18.34 21.26 22 17.09 22 12.07z"/>
</svg>
</a>

<!-- Instagram -->
<a href="#" target="_blank" class="dev-icon" aria-label="Instagram">
<svg viewBox="0 0 24 24" fill="currentColor">
<path d="M7 2C4.2 2 2 4.2 2 7v10c0 2.8 2.2 5 5 5h10c2.8 0 5-2.2 5-5V7c0-2.8-2.2-5-5-5H7zm10 2c1.7 0 3 1.3 3 3v10c0 1.7-1.3 3-3 3H7c-1.7 0-3-1.3-3-3V7c0-1.7 1.3-3 3-3h10zm-5 3.5A4.5 4.5 0 1 0 16.5 12 4.5 4.5 0 0 0 12 7.5zm0 7.4A2.9 2.9 0 1 1 14.9 12 2.9 2.9 0 0 1 12 14.9zm4.7-7.9a1.1 1.1 0 1 0 1.1 1.1 1.1 1.1 0 0 0-1.1-1.1z"/>
</svg>
</a>

</div>

</div>


<!-- CARD 2 -->
<div class="dev-card">

<img src="https://i.pravatar.cc/300?img=15"
class="dev-img">

<h3 class="dev-name">
Mr. Basant Karki
</h3>

<p class="dev-role">
Supervisor
</p>

<p class="dev-desc">
Providing guidance and mentorship
throughout the system development.
</p>

<div class="dev-socials">



<!-- LinkedIn -->
<a href="#" target="_blank" class="dev-icon" aria-label="LinkedIn">
<svg viewBox="0 0 24 24" fill="currentColor">
<path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 1 0-4 0v7h-4v-12h4v2a4 4 0 0 1 2-3z"/>
<circle cx="4" cy="4" r="2"/>
<rect x="2" y="9" width="4" height="12"/>
</svg>
</a>

<!-- Email -->
<a href="mailto:example@email.com" class="dev-icon" aria-label="Email">
<svg viewBox="0 0 24 24" fill="currentColor">
<path d="M22 6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6zm-2 0-8 5-8-5"/>
</svg>
</a>

<!-- Facebook -->
<a href="#" target="_blank" class="dev-icon" aria-label="Facebook">
<svg viewBox="0 0 24 24" fill="currentColor">
<path d="M22 12.07C22 6.48 17.52 2 11.93 2S2 6.48 2 12.07c0 5.02 3.66 9.19 8.44 9.93v-7.02H8.08v-2.9h2.29V9.41c0-2.27 1.35-3.52 3.42-3.52.99 0 2.03.18 2.03.18v2.23h-1.14c-1.12 0-1.47.69-1.47 1.4v1.68h2.5l-.4 2.9h-2.1v7.02C18.34 21.26 22 17.09 22 12.07z"/>
</svg>
</a>

<!-- Instagram -->
<a href="#" target="_blank" class="dev-icon" aria-label="Instagram">
<svg viewBox="0 0 24 24" fill="currentColor">
<path d="M7 2C4.2 2 2 4.2 2 7v10c0 2.8 2.2 5 5 5h10c2.8 0 5-2.2 5-5V7c0-2.8-2.2-5-5-5H7zm10 2c1.7 0 3 1.3 3 3v10c0 1.7-1.3 3-3 3H7c-1.7 0-3-1.3-3-3V7c0-1.7 1.3-3 3-3h10zm-5 3.5A4.5 4.5 0 1 0 16.5 12 4.5 4.5 0 0 0 12 7.5zm0 7.4A2.9 2.9 0 1 1 14.9 12 2.9 2.9 0 0 1 12 14.9zm4.7-7.9a1.1 1.1 0 1 0 1.1 1.1 1.1 1.1 0 0 0-1.1-1.1z"/>
</svg>
</a>

</div>

</div>


<!-- Developer Card 3 -->
<div class="dev-card">

<img src="https://media.licdn.com/dms/image/v2/D5603AQFEyVEXOGW8Vw/profile-displayphoto-scale_200_200/B56ZznMlykI0AY-/0/1773405368215?e=1775088000&v=beta&t=E8h6w2lVvPAJezfp9SiXCjOZCWdFd59Xj7WycIDdNU0"
class="dev-img">

<h3 class="dev-name">
Rupak Raut
</h3>

<p class="dev-role">
Laravel Developer
</p>

<p class="dev-desc">
Focused on frontend UI with Blade templates and backend integration using laravel.
</p>

<div class="dev-socials">

<!-- GitHub -->
<a href="https://github.com/Rupakraut-1234" target="_blank" class="dev-icon" aria-label="GitHub">
<svg viewBox="0 0 24 24" fill="currentColor">
<path d="M12 .5A12 12 0 0 0 0 12.7a12 12 0 0 0 8.2 11.4c.6.1.8-.2.8-.6v-2.1c-3.3.7-4-1.4-4-1.4-.6-1.6-1.5-2-1.5-2-1.2-.8.1-.8.1-.8 1.3.1 2 .9 2 .9 1.2 2 3.1 1.4 3.8 1 .1-.9.5-1.4.9-1.7-2.7-.3-5.5-1.4-5.5-6a4.7 4.7 0 0 1 1.2-3.2 4.4 4.4 0 0 1 .1-3.1s1-.3 3.3 1.2a11.5 11.5 0 0 1 6 0C17.7 4 18.7 4.3 18.7 4.3a4.4 4.4 0 0 1 .1 3.1 4.7 4.7 0 0 1 1.2 3.2c0 4.6-2.8 5.6-5.5 6 .5.4 1 1.2 1 2.3v3.3c0 .4.2.7.8.6A12 12 0 0 0 24 12.7 12 12 0 0 0 12 .5z"/>
</svg>
</a>

<!-- LinkedIn -->
<a href="https://www.linkedin.com/in/rupak-r-6b7692316/" target="_blank" class="dev-icon" aria-label="LinkedIn">
<svg viewBox="0 0 24 24" fill="currentColor">
<path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 1 0-4 0v7h-4v-12h4v2a4 4 0 0 1 2-3z"/>
<circle cx="4" cy="4" r="2"/>
<rect x="2" y="9" width="4" height="12"/>
</svg>
</a>

<!-- Email -->
<a href="mailto:rupakraut06@email.com" class="dev-icon" aria-label="Email">
<svg viewBox="0 0 24 24" fill="currentColor">
<path d="M22 6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6zm-2 0-8 5-8-5"/>
</svg>
</a>



</div>

</div>


<!-- CARD 4 -->
<div class="dev-card">

<img src="https://media.licdn.com/dms/image/v2/D4D03AQEGAh1gHlE5Kw/profile-displayphoto-crop_800_800/B4DZgCDQpiHMAI-/0/1752381068415?e=1775088000&v=beta&t=-XWZQYKOuq94RkIgAH_Itu-cPqFCmJa6UFZDyHo1W2k"
class="dev-img">

<h3 class="dev-name">
Mohit Guragain
</h3>

<p class="dev-role">
Backend Developer
</p>

<p class="dev-desc">
Focused on backend architecture,
database systems while supprting fronted development.
</p>

<div class="dev-socials">

<!-- GitHub -->
<a href="https://github.com/MOhitGuragain" target="_blank" class="dev-icon" aria-label="GitHub">
<svg viewBox="0 0 24 24" fill="currentColor">
<path d="M12 .5A12 12 0 0 0 0 12.7a12 12 0 0 0 8.2 11.4c.6.1.8-.2.8-.6v-2.1c-3.3.7-4-1.4-4-1.4-.6-1.6-1.5-2-1.5-2-1.2-.8.1-.8.1-.8 1.3.1 2 .9 2 .9 1.2 2 3.1 1.4 3.8 1 .1-.9.5-1.4.9-1.7-2.7-.3-5.5-1.4-5.5-6a4.7 4.7 0 0 1 1.2-3.2 4.4 4.4 0 0 1 .1-3.1s1-.3 3.3 1.2a11.5 11.5 0 0 1 6 0C17.7 4 18.7 4.3 18.7 4.3a4.4 4.4 0 0 1 .1 3.1 4.7 4.7 0 0 1 1.2 3.2c0 4.6-2.8 5.6-5.5 6 .5.4 1 1.2 1 2.3v3.3c0 .4.2.7.8.6A12 12 0 0 0 24 12.7 12 12 0 0 0 12 .5z"/>
</svg>
</a>

<!-- LinkedIn -->
<a href="https://www.linkedin.com/in/mohit-guragain-8bbab9374/" target="_blank" class="dev-icon" aria-label="LinkedIn">
<svg viewBox="0 0 24 24" fill="currentColor">
<path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 1 0-4 0v7h-4v-12h4v2a4 4 0 0 1 2-3z"/>
<circle cx="4" cy="4" r="2"/>
<rect x="2" y="9" width="4" height="12"/>
</svg>
</a>

<!-- Email -->
<a href="mailto:example@email.com" class="dev-icon" aria-label="Email">
<svg viewBox="0 0 24 24" fill="currentColor">
<path d="M22 6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6zm-2 0-8 5-8-5"/>
</svg>
</a>

<!-- Facebook -->
<a href="#" target="_blank" class="dev-icon" aria-label="Facebook">
<svg viewBox="0 0 24 24" fill="currentColor">
<path d="M22 12.07C22 6.48 17.52 2 11.93 2S2 6.48 2 12.07c0 5.02 3.66 9.19 8.44 9.93v-7.02H8.08v-2.9h2.29V9.41c0-2.27 1.35-3.52 3.42-3.52.99 0 2.03.18 2.03.18v2.23h-1.14c-1.12 0-1.47.69-1.47 1.4v1.68h2.5l-.4 2.9h-2.1v7.02C18.34 21.26 22 17.09 22 12.07z"/>
</svg>
</a>

<!-- Instagram -->
<a href="#" target="_blank" class="dev-icon" aria-label="Instagram">
<svg viewBox="0 0 24 24" fill="currentColor">
<path d="M7 2C4.2 2 2 4.2 2 7v10c0 2.8 2.2 5 5 5h10c2.8 0 5-2.2 5-5V7c0-2.8-2.2-5-5-5H7zm10 2c1.7 0 3 1.3 3 3v10c0 1.7-1.3 3-3 3H7c-1.7 0-3-1.3-3-3V7c0-1.7 1.3-3 3-3h10zm-5 3.5A4.5 4.5 0 1 0 16.5 12 4.5 4.5 0 0 0 12 7.5zm0 7.4A2.9 2.9 0 1 1 14.9 12 2.9 2.9 0 0 1 12 14.9zm4.7-7.9a1.1 1.1 0 1 0 1.1 1.1 1.1 1.1 0 0 0-1.1-1.1z"/>
</svg>
</a>

</div>

</div>




</div>

<!-- Collaboration Credit -->
<div class="mt-20 text-center">

<div class="w-20 h-px bg-gradient-to-r from-[#800020] to-[#D4AF37] mx-auto mb-6"></div>

<p class="text-gray-400 text-sm tracking-wide">
Powered by
</p>

<h3 class="text-2xl font-semibold text-white mt-2"
style="font-family:'Playfair Display', serif;">

<span class="text-[#D4AF37]">Venture Four Technology</span>

<span class="mx-2 text-gray-500">×</span>

<span class="text-[#D4AF37]">Hotel Gunja</span>

</h3>

<p class="text-gray-500 text-sm mt-3">
Technology & Hospitality Partnership
</p>

<div class="w-20 h-px bg-gradient-to-r from-[#D4AF37] to-[#800020] mx-auto mt-6"></div>

</div>

</div>

</section>


<style>

/* Developer Card */

.dev-card{
background:#111;
border:1px solid rgba(212,175,55,0.2);
border-radius:16px;
padding:30px;
text-align:center;
transition:all .35s ease;
}

.dev-card:hover{
transform:translateY(-8px);
border-color:#D4AF37;
box-shadow:0 10px 30px rgba(212,175,55,.15);
}

/* Image */

.dev-img{
width:110px;
height:110px;
border-radius:50%;
margin:auto;
object-fit:cover;
border:2px solid #D4AF37;
margin-bottom:20px;
}

/* Name */

.dev-name{
font-size:20px;
font-weight:600;
color:white;
margin-bottom:6px;
}

/* Role */

.dev-role{
color:#D4AF37;
font-weight:500;
margin-bottom:12px;
}

/* Description */

.dev-desc{
color:#9ca3af;
font-size:14px;
line-height:1.6;
margin-bottom:18px;
}

/* Social Icons */

.dev-socials{
display:flex;
justify-content:center;
gap:10px;
flex-wrap:wrap;
margin-top:12px;
}

.dev-icon{
width:34px;
height:34px;
border:1px solid rgba(212,175,55,0.4);
border-radius:9999px;
display:flex;
align-items:center;
justify-content:center;
color:#D4AF37;
transition:all .3s ease;
}

.dev-icon svg{
width:16px;
height:16px;
}

.dev-icon:hover{
background:#D4AF37;
color:#111;
transform:translateY(-2px);
box-shadow:0 4px 12px rgba(212,175,55,0.4);
}

</style>

@endsection