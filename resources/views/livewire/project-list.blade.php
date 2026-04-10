<?php

use App\Models\Project;
use Livewire\Volt\Component;

new class extends Component
{
    public $selectedProject = null; 
    public $isOpen = false;         

    public function showProject($id) // Changé $Id en $projectId pour la clarté
    {
        $this->selectedProject = Project::find($id);
        $this->isOpen = true;
    }

    public function closeProject()
    {
        $this->isOpen = false;
        // On ne vide pas forcément selectedProject ici pour éviter un flash visuel 
        // durant la transition de fermeture Alpine
    }

    public function with(): array
    {
        return [
            'projects' => Project::orderBy('order', 'asc')->get(),
        ];
    }
}; ?>

<div class="w-full">

    {{-- Grille des projets --}}
    <div class="grid grid-cols-1 md:grid-cols-12 gap-6 w-full">
        @forelse($projects as $project)
            <div wire:key="project-{{ $project->id }}" 
                 class="w-full {{ $project->is_featured ? 'md:col-span-8' : 'md:col-span-4' }} 
                        group relative overflow-hidden rounded-2xl bg-white/5 border border-white/10 
                        transition-all duration-500 hover:border-cyber-cyan/30 
                        min-h-[400px] md:min-h-[500px] flex flex-col">

                {{-- Image de fond --}}
                <div class="absolute inset-0 w-full h-full z-0">
                    @if($project->thumbnail)
                        <img src="{{ asset('storage/' . $project->thumbnail) }}" 
                             class="w-full h-full object-cover opacity-40 group-hover:scale-110 transition-transform duration-700">
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/60 to-transparent"></div>
                </div>

                {{-- Contenu du projet --}}
                <div class="relative z-10 flex flex-col justify-end h-full p-6 md:p-10">
                    <h3 class="text-2xl md:text-4xl font-bold mb-3 text-white tracking-tighter">{{ $project->title }}</h3>

                    <button wire:click="showProject({{ $project->id }})" 
                            class="text-[10px] font-mono uppercase tracking-[0.2em] text-cyber-cyan flex items-center gap-2 group/btn">
                        <span>Détails du projet</span>
                        <span class="group-hover/btn:translate-x-2 transition-transform duration-300">→</span>
                    </button>
                </div>
            </div>
        @empty
            <div class="col-span-1 md:col-span-12 py-20 text-center border border-dashed border-white/10 rounded-3xl text-white/20 font-mono">
                Aucun projet disponible...
            </div>
        @endforelse
    </div>

    {{-- Slide-over pour les détails du projet --}}
    <div x-data="{ open: @entangle('isOpen') }" 
         x-show="open" 
         x-on:keydown.escape.window="open = false; $wire.closeProject()"
         class="fixed inset-0 z-50 overflow-hidden" 
         style="display: none;">

        {{-- Fond semi-transparent --}}
        <div class="absolute inset-0 bg-black/90 backdrop-blur-sm" 
             x-show="open" 
             x-transition:opacity
             @click="open = false; $wire.closeProject()"></div>

        {{-- Contenu du slide-over --}}
        <div class="absolute inset-y-0 right-0 max-w-2xl w-full bg-[#0F0F10] border-l border-white/10 shadow-2xl"
             x-show="open"
             x-transition:enter="transform transition ease-in-out duration-500"
             x-transition:enter-start="translate-x-full"
             x-transition:enter-end="translate-x-0"
             x-transition:leave="transform transition ease-in-out duration-500"
             x-transition:leave-start="translate-x-0"
             x-transition:leave-end="translate-x-full">

            @isset($selectedProject)
                <div class="h-full flex flex-col p-8 md:p-12 overflow-y-auto">
                    <button @click="open = false; $wire.closeProject()" 
                            class="self-end text-white/50 hover:text-white mb-8 font-mono text-[10px] uppercase">
                        Fermer [ESC]
                    </button>

                    <span class="text-cyber-cyan font-mono text-xs uppercase tracking-widest mb-4">
                        {{ $selectedProject->category }}
                    </span>

                    <h2 class="text-4xl font-bold text-white mb-6 tracking-tighter italic">
                        {{ $selectedProject->title }}
                    </h2>

                    @if($selectedProject->thumbnail)
                        <img src="{{ asset('storage/' . $selectedProject->thumbnail) }}" 
                             class="rounded-2xl mb-8 border border-white/5 shadow-2xl">
                    @endif

                    <div class="prose prose-invert max-w-none text-gray-400 leading-relaxed font-light">
                        {!! $selectedProject->description_full !!}
                    </div>

                    @if($selectedProject->tech_stack)
                        <div class="mt-12 pt-8 border-t border-white/5">
                            <h4 class="text-white/30 font-bold mb-4 uppercase text-[10px] tracking-widest">Stack Technique</h4>
                            <div class="flex flex-wrap gap-2">
                                @foreach($selectedProject->tech_stack as $tech)
                                    <span class="px-3 py-1 bg-white/5 rounded border border-white/10 text-[10px] font-mono text-white/70">
                                        {{ $tech }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    @if($selectedProject->demo_url)
                       <div class="mt-12 pt-8 border-t border-white/5 animate-fade-up">
                           <a href="{{ $selectedProject->demo_url }}" 
                              target="_blank" 
                              rel="noopener noreferrer"
                              class="group relative flex items-center justify-center gap-3 w-full px-8 py-5 bg-white text-black rounded-2xl font-bold transition-all duration-500 hover:bg-cyber-cyan hover:shadow-[0_0_40px_rgba(0,255,243,0.4)]">
            
                               <span class="text-xs uppercase tracking-[0.2em]">Visiter le site fictif</span>
            
                               <svg class="w-5 h-5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                               </svg>
                           </a>
                           <p class="mt-4 text-center text-[9px] font-mono text-white/20 uppercase tracking-[0.3em]">
                              Prototype interactif • 2026
                           </p>
                      </div>
                  @endif
                </div>
            @endisset
        </div>
    </div>
</div>