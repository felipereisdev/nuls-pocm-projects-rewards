@extends('adminlte::page')

@section('title', 'POCM Projects Rewards')

@section('content_header')
    <h4>Projects List - Updated every 10 minutes</h4>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="dataTable" class="table table-hover">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Total Staking</th>
                            <th>Daily reward/100 NULS</th>
                            <th>Participants</th>
                            <th>Minimum NULS required</th>
                            <th>Opções</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('footer')
<footer class="main-footer" style="display: flex; justify-content: center; align-items: center;">
    <strong>Made with love!</strong>
    
    <p style="display: flex; justify-content: center; align-items: center;">
        <span>Donate:</span>
        
        <label class="btc donate-crypto-box">
            <div class="coin">
                <div class="coin-face">
                    <svg height="10" viewBox="0 0 32 32" width="10" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21.78 15.37c.51-.61.83-1.4.83-2.26 0-2.74-1.6-4.38-4.24-4.38V5.45c0-.12-.1-.22-.22-.22h-1.27c-.11 0-.2.1-.2.21v3.3h-1.7V5.44c0-.12-.1-.22-.22-.22H13.5c-.12 0-.2.1-.21.21v3.3H9.67c-.12 0-.21.09-.21.21v1.31c0 .12.1.22.21.22h.21c.94 0 1.7.79 1.7 1.75v7c0 .92-.68 1.67-1.55 1.75a.21.21 0 0 0-.18.16l-.33 1.32c-.01.06 0 .13.04.19.04.05.1.08.17.08h3.55v3.3c0 .1.1.2.2.2h1.28c.12 0 .21-.1.21-.22v-3.28h1.7v3.3c0 .1.1.2.21.2h1.27c.12 0 .22-.1.22-.22v-3.28h.85c2.65 0 4.24-1.64 4.24-4.37 0-1.28-.68-2.39-1.68-3zm-6.8-4.01h2.54c.94 0 1.7.78 1.7 1.75 0 .96-.76 1.75-1.7 1.75h-2.55v-3.5zm3.39 8.75h-3.4v-3.5h3.4c.93 0 1.7.78 1.7 1.75 0 .96-.77 1.75-1.7 1.75z" fill="#FFF"></path>
                    </svg>
                </div>
                <div class="coin-face"></div>
                <div class="coin-face"></div>
                <div class="coin-face"></div>
                <div class="coin-face">
                    <svg height="10" viewBox="0 0 32 32" width="10" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21.78 15.37c.51-.61.83-1.4.83-2.26 0-2.74-1.6-4.38-4.24-4.38V5.45c0-.12-.1-.22-.22-.22h-1.27c-.11 0-.2.1-.2.21v3.3h-1.7V5.44c0-.12-.1-.22-.22-.22H13.5c-.12 0-.2.1-.21.21v3.3H9.67c-.12 0-.21.09-.21.21v1.31c0 .12.1.22.21.22h.21c.94 0 1.7.79 1.7 1.75v7c0 .92-.68 1.67-1.55 1.75a.21.21 0 0 0-.18.16l-.33 1.32c-.01.06 0 .13.04.19.04.05.1.08.17.08h3.55v3.3c0 .1.1.2.2.2h1.28c.12 0 .21-.1.21-.22v-3.28h1.7v3.3c0 .1.1.2.21.2h1.27c.12 0 .22-.1.22-.22v-3.28h.85c2.65 0 4.24-1.64 4.24-4.37 0-1.28-.68-2.39-1.68-3zm-6.8-4.01h2.54c.94 0 1.7.78 1.7 1.75 0 .96-.76 1.75-1.7 1.75h-2.55v-3.5zm3.39 8.75h-3.4v-3.5h3.4c.93 0 1.7.78 1.7 1.75 0 .96-.77 1.75-1.7 1.75z" fill="#FFF"></path>
                    </svg>
                </div>
            </div>
            <input class="coin-address" onclick="this.select()" readonly="readonly" spellcheck="false" type="text" value="bc1q9jms8369pzl5frll77pzscqzya5exy866wf40r" />
        </label>
    </p>
</footer>
@stop

@section('css')
    <style>
        .donate-crypto-box {
            display: flex;
            align-items: center;
            width: 100%;
            padding: 1em;
            box-sizing: border-box;
            user-select: none;
            cursor: text;
        }

        .coin {
            display: inline-block;
            position: relative;
            min-width: 2em;
            min-height: 2em;
            animation: spin 3s cubic-bezier(.3,2,.4,.8) infinite both;
            transform-style: preserve-3d;
            vertical-align: middle;
            
            @keyframes spin {
                0%, 10% {
                    transform: rotate(-10deg) perspective(400px);
                }
                90%, 100% {
                    transform: rotate(-10deg) perspective(400px) rotateY(180deg);
                }
            }
        }

        .coin-face {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            border-radius: 50%;
            
            &:nth-child(1) { transform: translateZ(-.2em) rotateY(-180deg); }
            &:nth-child(2) { transform: translateZ(-.1em); }
            &:nth-child(4) { transform: translateZ(.1em); }
            &:nth-child(5) { transform: translateZ(.2em); }
            
            svg {
                width: 100%;
                height: 100%;
            }

            background: shade(#ff9900, 35%);
            
            &:nth-child(1),
            &:nth-child(5) {
                background: #ff9900;
            }
        }

        .coin-address {
            flex: 1;
            font: .7em/2.5 Monaco, monospace;
            text-align: center;
            margin-left: 1em;
            border-width: 0 0 2px;
            border-color: rgba(black, .1);
            transition: border-color .3s;
            cursor: text;

            &:hover { transition-duration: .1s; }

            &:hover, &:focus { border-color: #ff9900; }
        }

        .btc {
            max-width: 21em;
        }
    </style>
@stop

@section('js')
    <script src="{{ url(mix('js/app.js')) }}"></script>
@stop
