<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- SEO / OpenGraph --}}
        <title>Joseph & Co — Fullstack & PropTech Architect</title>
        <meta name="description" content="Expert TALL Stack (Laravel, Filament PHP) basé au Togo. Créateur de plateformes immobilières de luxe.">
        <meta property="og:title" content="Joseph & Co | Architecte Fullstack">
        <meta property="og:image" content="{{ asset('images/og-portfolio.jpg') }}">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            /* Animations Fade-up pour le Hero */
            @keyframes fade-up {
                from { opacity: 0; transform: translateY(20px); }
                to { opacity: 1; transform: translateY(0); }
            }
            .animate-fade-up {
                animation: fade-up 0.8s ease-out forwards;
            }

            /* Configuration couleur Cyber Cyan pour Tailwind v4 */
            @theme {
                --color-cyber-cyan: #00FFF3;
            }
        </style>
    </head>
    <body class="bg-[#09090B] text-[#F4F4F5] font-sans selection:bg-[#00FFF3] selection:text-[#09090B] overflow-x-hidden antialiased">
        
        {{-- Effet de Grain --}}
        <div class="fixed inset-0 z-[9999] pointer-events-none opacity-[0.03] bg-[url('https://grainy-gradients.vercel.app/noise.svg')]"></div>

        {{-- HEADER - Adapté mobile (backdrop-blur réduit) --}}
        <header class="fixed top-0 w-full z-50 p-6 lg:px-12 flex justify-between items-center backdrop-blur-[6px] border-b border-white/[0.03]">
            <div class="text-sm font-bold tracking-tighter uppercase flex items-center gap-2">
                Joseph & Co<span class="text-[#00FFF3]">.</span>
            </div>
            
            @if (Route::has('login'))
                <nav class="flex items-center gap-6">
                    @auth
                        <a href="{{ url('/admin') }}" class="text-[10px] font-mono tracking-widest text-[#00FFF3] border border-[#00FFF3]/30 px-4 py-2 rounded-full hover:bg-[#00FFF3]/10 transition-all">
                            CONSOLE_ADMIN
                        </a>
                    @else
                        {{-- Caché sur mobile pour la clarté --}}
                        <a href="{{ route('login') }}" class="text-xs font-mono tracking-widest opacity-40 hover:opacity-100 transition-opacity uppercase hidden sm:block">
                            Login
                        </a>
                    @endauth
                </nav>
            @endif
        </header>

        {{-- HERO SECTION - Optimisée mobile (Titres réduits, boutons empilés) --}}
        <main class="relative min-h-[90vh] md:min-h-screen flex flex-col items-center justify-center pt-32 pb-20 overflow-hidden">
            
            <div class="absolute top-1/4 -left-20 w-[500px] h-[500px] bg-[#00FFF3]/5 rounded-full blur-[120px]"></div>
            <div class="absolute bottom-1/4 -right-20 w-[500px] h-[500px] bg-[#C4A484]/5 rounded-full blur-[120px]"></div>

            <section class="relative z-10 w-full max-w-5xl px-6 text-center">
                <div class="animate-fade-up" style="animation-delay: 0.1s">
                    <h4 class="text-[#00FFF3] font-mono text-[9px] md:text-[10px] tracking-[0.4em] md:tracking-[0.5em] uppercase mb-12 border border-[#00FFF3]/20 rounded-full px-5 py-3 bg-[#00FFF3]/5 inline-block">
                        Web Developer & Freelance • Togo
                    </h4>
                </div>
                
                <div class="animate-fade-up" style="animation-delay: 0.3s">
                    <h1 class="text-5xl md:text-8xl font-bold tracking-tighter mb-12 md:mb-8 leading-[1]">
                        L'art de bâtir le <br/> 
                        <span class="text-transparent bg-clip-text bg-gradient-to-b from-[#F4F4F5] to-[#F4F4F5]/40 italic">Futur Immobilier.</span>
                    </h1>
                </div>

                <div class="animate-fade-up" style="animation-delay: 0.5s">
                    <p class="max-w-2xl mx-auto text-[#F4F4F5]/50 text-lg md:text-xl mb-20 leading-relaxed font-light">
                        Expert en écosystème <span class="text-[#F4F4F5] font-semibold tracking-tight">Laravel (TALL Stack)</span>. 
                        Je conçois des plateformes qui allient l'exigence du luxe à la précision de la donnée.
                    </p>
                </div>

                {{-- Boutons empilés sur mobile (flex-col) --}}
                <div class="flex flex-col md:flex-row items-center justify-center gap-10 md:gap-8 animate-fade-up" style="animation-delay: 0.7s">
                    <a href="#projects" class="group relative px-10 py-5 w-full md:w-auto bg-[#F4F4F5] text-[#09090B] font-bold rounded-2xl md:rounded-full overflow-hidden transition-transform hover:scale-105 active:scale-95 text-sm uppercase tracking-widest">
                        Découvrir mes projets
                    </a>
                    
                    <a href="https://wa.me/22897630690" target="_blank" class="group flex items-center gap-3 text-[10px] font-mono tracking-[0.2em] uppercase text-[#F4F4F5]/60 hover:text-[#00FFF3] transition-colors py-4">
                        Démarrer une discussion
                        <span class="group-hover:translate-x-2 transition-transform text-[#00FFF3]">→</span>
                    </a>
                </div>
            </section>

            <div class="absolute bottom-10 left-1/2 -translate-x-1/2 opacity-20 hidden md:block">
                <div class="w-px h-12 bg-gradient-to-b from-[#F4F4F5] to-transparent animate-pulse"></div>
            </div>

        </main>

        {{-- SECTION PROJETS - Adaptée mobile (Espacement uniforme) --}}
        <section id="projects" class="py-24 px-6 lg:px-12 max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-20 gap-6">
                <div>
                    <span class="text-[#00FFF3] font-mono text-[10px] tracking-[0.4em] uppercase mb-3 block">Expertise</span>
                    <h2 class="text-4xl md:text-5xl font-bold tracking-tight mb-2 italic">Portfolio Sélectionné</h2>
                    <p class="text-[#F4F4F5]/30 font-mono text-xs uppercase tracking-widest mt-4">Preuve technique par le code</p>
                </div>
                <div class="text-left md:text-right w-full md:w-auto">
                    <span class="text-[9px] font-mono text-[#00FFF3] border border-[#00FFF3]/20 px-3 py-1 rounded-md bg-[#00FFF3]/5">MISE À JOUR 2026</span>
                </div>
            </div>

            @livewire('project-list')
        </section>

        {{-- SECTION SERVICES - Optimisée mobile (1 colonne sur téléphone, Animations Intersect) --}}
        <section 
            x-data="{ shown: false }" 
            x-intersect.once="shown = true"
            :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'"
            class="transition-all duration-1000 ease-out py-24 px-6 lg:px-12 max-w-7xl mx-auto border-t border-white/5 relative overflow-hidden"
        >
            {{-- Décoration d'arrière-plan --}}
            <div class="absolute top-0 right-0 -translate-y-1/2 translate-x-1/2 w-[500px] h-[500px] bg-[#00FFF3]/5 rounded-full blur-[120px] pointer-events-none"></div>

            <div class="mb-24">
                <span class="text-[#00FFF3] font-mono text-[10px] uppercase tracking-[0.4em] px-4 py-2 border border-[#00FFF3]/20 rounded-full bg-[#00FFF3]/5">
                    Offre de Service
                </span>
                <h2 class="text-5xl md:text-7xl font-bold text-white tracking-tighter mt-10 italic">
                    Solutions <span class="text-white/20">sur mesure.</span>
                </h2>
            </div>

            {{-- Grille responsive (1 colonne mobile, 3 colonnes PC) --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-6">
                
                <div class="group relative p-10 rounded-[2.5rem] bg-gradient-to-b from-white/[0.05] to-transparent border border-white/10 hover:border-[#00FFF3]/40 transition-all duration-500 shadow-2xl">
                    <div class="mb-10 p-5 w-fit rounded-2xl bg-black border border-white/5 group-hover:scale-110 group-hover:bg-[#00FFF3]/10 transition-transform duration-500">
                        <svg class="w-8 h-8 text-[#00FFF3]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    </div>
                    <h4 class="text-2xl font-bold text-white mb-5 italic tracking-tight">Architecture Fullstack</h4>
                    <p class="text-gray-400 text-sm leading-relaxed mb-8 font-light">Conception d'écosystèmes robustes sous **Laravel 11**. Rapidité extrême avec Alpine.js et Livewire pour une fluidité native.</p>
                    <div class="flex gap-4">
                        <span class="text-[9px] font-mono text-white/40 uppercase tracking-widest">TALL Stack</span>
                        <span class="text-[9px] font-mono text-white/40 uppercase tracking-widest">Docker</span>
                    </div>
                </div>

                <div class="group relative p-10 rounded-[2.5rem] bg-gradient-to-b from-white/[0.05] to-transparent border border-white/10 hover:border-[#00FFF3]/40 transition-all duration-500 shadow-2xl">
                    <div class="mb-10 p-5 w-fit rounded-2xl bg-black border border-white/5 group-hover:scale-110 group-hover:bg-[#00FFF3]/10 transition-transform duration-500">
                        <svg class="w-8 h-8 text-[#00FFF3]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path></svg>
                    </div>
                    <h4 class="text-2xl font-bold text-white mb-5 italic tracking-tight">Dashboards & Admin</h4>
                    <p class="text-gray-400 text-sm leading-relaxed mb-8 font-light">Expertise **Filament PHP**. Je transforme vos données complexes en outils de gestion simplifiés et élégants pour votre business.</p>
                    <div class="flex gap-4">
                        <span class="text-[9px] font-mono text-white/40 uppercase tracking-widest">Filament</span>
                        <span class="text-[9px] font-mono text-white/40 uppercase tracking-widest">BI</span>
                    </div>
                </div>

                <div class="group relative p-10 rounded-[2.5rem] bg-gradient-to-b from-white/[0.05] to-transparent border border-white/10 hover:border-[#00FFF3]/40 transition-all duration-500 shadow-2xl">
                    <div class="mb-10 p-5 w-fit rounded-2xl bg-black border border-white/5 group-hover:scale-110 group-hover:bg-[#00FFF3]/10 transition-transform duration-500">
                        <svg class="w-8 h-8 text-[#00FFF3]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </div>
                    <h4 class="text-2xl font-bold text-white mb-5 italic tracking-tight">UI/UX & IA Intégration</h4>
                    <p class="text-gray-400 text-sm leading-relaxed mb-8 font-light">Design d'interfaces haute-fidélité. Intégration de solutions intelligentes (NLP, Search AI) pour moderniser l'expérience utilisateur.</p>
                    <div class="flex gap-4">
                        <span class="text-[9px] font-mono text-white/40 uppercase tracking-widest">Adobe CC</span>
                        <span class="text-[9px] font-mono text-white/40 uppercase tracking-widest">PropTech</span>
                    </div>
                </div>
            </div>
        </section>

        {{-- SECTION CTA - Adaptée mobile (Titres réduits, animations) --}}
        <section 
            x-data="{ shown: false }" 
            x-intersect.once="shown = true"
            :class="shown ? 'opacity-100' : 'opacity-0'"
            class="py-32 md:py-48 px-6 flex flex-col items-center text-center transition-opacity duration-1000 border-t border-white/5"
        >
            {{-- Badge mobile-friendly --}}
            <div class="inline-flex items-center gap-3 px-4 py-2 rounded-full bg-[#00FFF3]/10 border border-[#00FFF3]/20 mb-12">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-[#00FFF3] opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-[#00FFF3]"></span>
                </span>
                <span class="text-[10px] font-mono text-[#00FFF3] uppercase tracking-[0.2em]">Disponibilité immédiate</span>
            </div>

            <h3 class="text-5xl md:text-9xl font-bold text-white mb-16 tracking-tighter italic leading-[1]">
                On lance votre <br/> <span class="text-transparent bg-clip-text bg-gradient-to-r from-white via-white to-[#00FFF3]/50">prochaine idée ?</span>
            </h3>
        
            {{-- Bouton WhatsApp avec effet de lueur (Optimisé tactile) --}}
            <a href="https://wa.me/22897630690"
               target="_blank"
               class="group relative px-10 md:px-12 py-6 w-full md:w-auto bg-white text-black font-extrabold rounded-2xl md:rounded-full transition-all duration-500 hover:bg-[#00FFF3] hover:shadow-[0_0_60px_rgba(0,255,243,0.5)] hover:-translate-y-1 shadow-xl">
            
                <div class="flex items-center justify-center gap-3">
                    <span class="uppercase text-xs tracking-[0.2em]">Discuter sur WhatsApp</span>
                    <svg class="w-5 h-5 transition-transform group-hover:rotate-12 group-hover:scale-110" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L0 24l6.335-1.662c1.72.94 3.659 1.437 5.634 1.437h.005c6.558 0 11.894-5.335 11.897-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                    </svg>
                </div>
            </a>
        </section>

        {{-- FOOTER - Adapté mobile (Espacement discret) --}}
        <footer class="py-12 text-center border-t border-[#F4F4F5]/5 px-6">
            <p class="text-[9px] md:text-[10px] font-mono tracking-[0.4em] md:tracking-[0.5em] text-[#F4F4F5]/20 uppercase mb-3">
                © 2026 Joseph Benoit Djagli. Built in Lomé.
            </p>
            <p class="text-[8px] font-mono text-[#F4F4F5]/10 uppercase tracking-widest">
                Laravel • Tailwind • Livewire • Filament PHP
            </p>
        </footer>

    </body>
</html>