<?php $__env->startSection('title'); ?>
    <?php echo e(__('Roulette')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('title_extra'); ?>
    <button class="btn btn-sm btn-primary float-right mt-2" type="button" data-toggle="collapse" data-target="#provably-fair-form" aria-expanded="false" aria-controls="provably-fair-form">
        <?php echo e(__('Provably fair')); ?>

    </button>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('frontend.includes.provably-fair-form', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div id="game_roulette_conteiner" class="gr-conteiner game-roulette <?php echo e(config('settings.theme')); ?>">
		<div class="inner">
			<img id="game_roulette_bg" class="bg" src="/images/games/roulette/<?php echo e(config('settings.theme')); ?>/bg.png">
			<div class="gr-btns-group-settings">
				<button id="gr_btn_mute" type="button" class="gr-btn-mute">
					<object>
						<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="none">
							<path fill="#fff" stroke="#fff" d="M7.6 20.9l-.1-.1H.7v-9.5h6.8l.1-.2 7.9-7.9v25.6l-7.9-7.9zM28.8 16c0-5.6-3.7-10.4-8.8-12.1V1.3a15.3 15.3 0 0 1 0 29.4v-2.6c5-1.7 8.8-6.5 8.8-12.1zM20 9.8c2 1.3 3.4 3.6 3.4 6.2S22 20.9 20 22.2V9.8z"/>
							<path class="mute" fill="#fff" stroke="#fff" d="M0 0L32 32" stroke-width="4"></path>
						</svg>
					</object>
				</button>
				<button id="gr_btn_fulls" type="button" class="gr-btn-fullscreen">
					<object>
						<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="none">
							<path class="fullscreen-enter" fill="#fff" stroke="#fff" d="M6 29h6v2H1V20h2v7l1-1 8-7 1 1-7 8-1 1h1zm7-17l-1 1-8-7-1-1v7H1V1h11v2H5l1 1 7 8zm16 14v-6h2v11H20v-2h7l-1-1-7-8 1-1 8 7 1 1v-1zM28 6l-8 7-1-1 7-8 1-1h-7V1h11v11h-2V5l-1 1z"/>
							<path class="fullscreen-exit" fill="#fff" stroke="#fff" d="M8 21H2v-2h11v11h-2v-7l-1 1-8 7-1-1 7-8 1-1zM22 8l8-7 1 1-7 8-1 1h7v2H19V2h2v7zM8 10L1 2l1-1 8 7 1 1V2h2v11H2v-2h7zM21 24v6h-2V19h11v2h-7l1 1 7 8-1 1-8-7-1-1z"/>
						</svg>
					</object>
				</button>
			</div>
			<div id="gr_clip_view" class="gr-game-clip-view"></div>
			<div id="gr_text_message" class="gr-game-message"><?php echo e(__('Place a bet and play')); ?></div>
			
            <div class="gr-roulette">
                <canvas id="gr_roulette_wheel" width=480 height=480></canvas>
            </div>
            
            <div class="gr-bets enabled">
                <?php
                    $columns_color=[ 0,
                        'r','b','r',
                        'b','r','b',
                        'r','b','r',
                        'b','b','r',
                        
                        'b','r','b',
                        'r','b','r',
                        'r','b','r',
                        'b','r','b',
                        
                        'r','b','r',
                        'b','b','r',
                        'b','r','b',
                        'r','b','r',
                        
                    ];
                ?>
                
                <div id="gr_bet_btn_2to1_3"     class="gr-bet-2to1 column-3"    data-bet="column3"   ><?php echo e(__('2:1')); ?></div>
                <div id="gr_bet_btn_2to1_2"     class="gr-bet-2to1 column-2"    data-bet="column2"   ><?php echo e(__('2:1')); ?></div>
                <div id="gr_bet_btn_2to1_1"     class="gr-bet-2to1 column-1"    data-bet="column1"   ><?php echo e(__('2:1')); ?></div>
                <div id="gr_bet_btn_doz_1"      class="gr-bet-dozen dozen-1"    data-bet="dozen1"    ><?php echo e(__('1st 12')); ?></div>
                <div id="gr_bet_btn_doz_2"      class="gr-bet-dozen dozen-2"    data-bet="dozen2"    ><?php echo e(__('2nd 12')); ?></div>
                <div id="gr_bet_btn_doz_3"      class="gr-bet-dozen dozen-3"    data-bet="dozen3"    ><?php echo e(__('3rd 12')); ?></div>
                <div id="gr_bet_btn_low"        class="gr-bet-spec bet-low"     data-bet="low"       ><?php echo e(__('1 to 18')); ?></div>
                <div id="gr_bet_btn_even"       class="gr-bet-spec bet-even"    data-bet="even"    ><?php echo e(__('Even')); ?></div>
                <div id="gr_bet_btn_red"        class="gr-bet-spec bet-red"     data-bet="red"    ><?php echo e(__('Red')); ?></div>
                <div id="gr_bet_btn_black"      class="gr-bet-spec bet-black"   data-bet="black"    ><?php echo e(__('Black')); ?></div>
                <div id="gr_bet_btn_odd"        class="gr-bet-spec bet-odd"     data-bet="odd"    ><?php echo e(__('Odd')); ?></div>
                <div id="gr_bet_btn_high"       class="gr-bet-spec bet-high"    data-bet="high"      ><?php echo e(__('19 to 36')); ?></div>
                <div id="gr_bet_btn_top_line"   class="gr-bet-inv bet-top-line" data-bet="top_line"  ></div>
                
                <?php for($i=1,$c=1;$i<37;$i+=3,$c++): ?>
                    <div class="gr-bet-inv bet-street street-<?php echo e($c); ?> street-n<?php echo e($i); ?>" data-bet="street<?php echo e($i); ?>"></div>
                <?php endfor; ?>
                
                
                <?php for($i=1;$i<34;$i+=3): ?>
                    <div class="gr-bet-inv bet-sixline sixline-<?php echo e($i); ?>" data-bet="sixline<?php echo e($i); ?>"></div>
                <?php endfor; ?>
                
                
                <?php for($i=1,$c=1;$i<34;$i+=3,$c++): ?>
                    <div class="gr-bet-inv bet-corner corner-1 cpos-<?php echo e($c); ?> corner-n<?php echo e($i); ?>" data-bet="corner<?php echo e($i); ?>"></div>
                <?php endfor; ?>
                <?php for($i=2,$c=1;$i<34;$i+=3,$c++): ?>
                    <div class="gr-bet-inv bet-corner corner-2 cpos-<?php echo e($c); ?> corner-n<?php echo e($i); ?>" data-bet="corner<?php echo e($i); ?>"></div>
                <?php endfor; ?>
                
                
                <?php for($i=1,$c=1;$i<37;$i+=3,$c++): ?>
                    <div class="gr-bet-inv bet-split split-v split-v-1 split-<?php echo e($c); ?>" data-bet="split<?php echo e($i); ?>_<?php echo e($i+1); ?>"></div>
                <?php endfor; ?>
                <?php for($i=2,$c=1;$i<37;$i+=3,$c++): ?>
                    <div class="gr-bet-inv bet-split split-v split-v-2 split-<?php echo e($c); ?>" data-bet="split<?php echo e($i); ?>_<?php echo e($i+1); ?>"></div>
                <?php endfor; ?>
                <?php for($i=1,$c=1;$c<12;$i+=3,$c++): ?>
                    <div class="gr-bet-inv bet-split split-h split-h-1 split-<?php echo e($c); ?>" data-bet="split<?php echo e($i); ?>_<?php echo e($i+3); ?>"></div>
                <?php endfor; ?>
                <?php for($i=2,$c=1;$c<12;$i+=3,$c++): ?>
                    <div class="gr-bet-inv bet-split split-h split-h-2 split-<?php echo e($c); ?>" data-bet="split<?php echo e($i); ?>_<?php echo e($i+3); ?>"></div>
                <?php endfor; ?>
                <?php for($i=3,$c=1;$c<12;$i+=3,$c++): ?>
                    <div class="gr-bet-inv bet-split split-h split-h-3 split-<?php echo e($c); ?>" data-bet="split<?php echo e($i); ?>_<?php echo e($i+3); ?>"></div>
                <?php endfor; ?>
                
                <div class="gr-bet-zero" data-bet="straight0">0</div>
                
                <div class="gr-bets-column column-3">
                    <?php for($i=3;$i<37;$i+=3): ?>
                        <div class="gr-bets-bet gr-bet  <?php echo e($columns_color[$i]=='r'?'red':'black'); ?>" data-bet="straight<?php echo e($i); ?>"><?php echo e($i); ?></div>
                    <?php endfor; ?>
                </div>
                <div class="gr-bets-column column-2">
                    <?php for($i=2;$i<37;$i+=3): ?>
                        <div class="gr-bets-bet gr-bet  <?php echo e($columns_color[$i]=='r'?'red':'black'); ?>" data-bet="straight<?php echo e($i); ?>"><?php echo e($i); ?></div>
                    <?php endfor; ?>
                </div>
                <div class="gr-bets-column column-1">
                    <?php for($i=1;$i<37;$i+=3): ?>
                        <div class="gr-bets-bet gr-bet  <?php echo e($columns_color[$i]=='r'?'red':'black'); ?>" data-bet="straight<?php echo e($i); ?>"><?php echo e($i); ?></div>
                    <?php endfor; ?>
                </div>
            </div>
            			
			<div class="gr-game-panel">
				<div class="gr-bet-size">
					<div class="label text-uppercase"><?php echo e(__('Bet size')); ?></div>
					<button id="gr_bet_btn_minus" class="gr-bet-btn minus" type="button"><span></span></button>
					<span id="gr_bet_text" class="value"><?php echo e(config('game-roulette.default_bet_amount')); ?></span>
					<button id="gr_bet_btn_plus" class="gr-bet-btn plus" type="button"><span></span></button>
				</div>
				<button id="gr_bet_btn_repeat" class="gr-btn-base repeat" type="button"><span class="text-uppercase"><?php echo e(__('Repeat')); ?></span></button>
				<button id="gr_bet_btn_double" class="gr-btn-base double" type="button"><span class="text-uppercase"><?php echo e(__('Double')); ?></span></button>
				<button id="gr_btn_spin" class="gr-btn-spin" type="button"><span></span></button>
				<button id="gr_bet_btn_clear" class="gr-btn-base clear" type="button"><span class="text-uppercase"><?php echo e(__('Clear')); ?></span></button>
				<div class="gr-text balance">
					<span class="name"><?php echo e(__('Balance')); ?></span>
					<span id="gr_balance_text" class="value"><?php echo e(auth()->user()->account->balance); ?></span>
				</div>
			</div>
		</div>
		<div id="gr_preloader" class="preloader">
			<div>
				<img src="<?php echo e(asset('images/games/roulette/' . $settings->theme . '/loader.svg')); ?>" alt="">
				<span><?php echo e(__('Loading...')); ?><span id="gr_preloader_text" class="value">0%</span></span>
			</div>
		</div>
	</div>
    
	
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(mix('css/games/roulette/' . $settings->theme . '.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('js/preloadjs.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/soundjs.min.js')); ?>"></script>
    <script src="<?php echo e(mix('js/games/roulette/game.js')); ?>"></script>
    <script>
        window.addEventListener("DOMContentLoaded",function(){
            window.GameRoulette({
                game_id: <?php echo e($game->id); ?>,
                min_bet: <?php echo e(config('game-roulette.min_bet')); ?>,
                max_bet: <?php echo e(config('game-roulette.max_bet')); ?>,
                bet_change_amount: <?php echo e(config('game-roulette.bet_change_amount')); ?>,
                default_bet_amount: <?php echo e(config('game-roulette.default_bet_amount')); ?>,
                balance: <?php echo e($game->account->balance); ?>,
                routes: {
                    play: '<?php echo e(route('games.roulette.play')); ?>'
                },
                game_theme: '<?php echo e(config('settings.theme')); ?>'
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>