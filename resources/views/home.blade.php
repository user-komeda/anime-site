<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <title>Document</title>
</head>

<body>
  <header class="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
      <h1 class="h1">
        <a class="navbar-brand font-weight-bold" href="#">アニメまとめ</a>
      </h1>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">アニメ一覧</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">年代別アニメ</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <main class="container">
    <div class=" row mt-4">
      <div class="col-md-8">
        <aside class="p-3 border bg-white">
          <h2 class="h2 p-2 text-white bg-danger">新着情報</h2>
          <ul class="list-group list-group-flush ">
            <li class="list-group-item border-0">Cras justo odio</li>
            <li class="list-group-item border-0">Dapibus ac facilisis in</li>
            <li class="list-group-item border-0">Morbi leo risus</li>
            <li class="list-group-item border-0">Porta ac consectetur ac</li>
            <li class="list-group-item border-0">Vestibulum at eros</li>
          </ul>
        </aside>
        <section class="section p-3 mt-4 border">
          <h2 class="h2 p-2 text-white bg-danger">曜日別アニメ一覧</h2>
          <div class="row-sm list-group list-group-horizontal text-center" id="js-week-tabs">
            <a class="py-2 px-1 col list-group-item list-group-item-action active flex-fill" href="#mon"
              data-toggle="tab">月</a>
            <a class="py-2 px-1 col list-group-item list-group-item-action flex-fill" href="#thu"
              data-toggle="tab">火</a>
            <a class="py-2 px-1 col list-group-item list-group-item-action flex-fill" href="#" data-toggle="tab">水</a>
            <a class="py-2 px-1 col list-group-item list-group-item-action flex-fill" href="#" data-toggle="tab">木</a>
            <a class="py-2 px-1 col list-group-item list-group-item-action flex-fill" href="#" data-toggle="tab">金</a>
            <a class="py-2 px-1 col list-group-item list-group-item-action flex-fill" href="#" data-toggle="tab">土</a>
            <a class="py-2 px-1 col list-group-item list-group-item-action flex-fill" href="#" data-toggle="tab">日</a>
          </div>
          <span class="tab-content">
            <div class="tab-pane active mt-2 row" id="mon">
              <article class="col-6 col-md-4">
                <a href="#">
                  <figure>
                    <img class="img-fluid" src="https://img.anime-hiroba.com/04d91ca0048c474b0ae002d843920c38.jpg"
                      alt="">
                    <p class="m-0 bg-dark text-white text-center">test</p>
                  </figure>
                </a>
              </article>
              <article class="col-6 col-md-4">
                <a href="#">
                  <figure>
                    <img class="img-fluid" src="https://img.anime-hiroba.com/04d91ca0048c474b0ae002d843920c38.jpg"
                      alt="">
                    <p class="m-0 bg-dark text-white text-center">test</p>
                  </figure>
                </a>
              </article>
              <article class="col-6 col-md-4">
                <a href="#">
                  <figure>
                    <img class="img-fluid" src=" https://img.anime-hiroba.com/04d91ca0048c474b0ae002d843920c38.jpg"
                      alt="">
                    <p class="m-0 bg-dark text-white text-center">test</p>
                  </figure>
                </a>
              </article>
              <article class="col-6 col-md-4">
                <a href="#">
                  <figure>
                    <img class="img-fluid" src="https://img.anime-hiroba.com/04d91ca0048c474b0ae002d843920c38.jpg"
                      alt="">
                    <p class="m-0 bg-dark text-white text-center">test</p>
                  </figure>
                </a>
              </article>
              <article class="col-6 col-md-4">
                <a href="#">
                  <figure>
                    <img class="img-fluid" src="https://img.anime-hiroba.com/04d91ca0048c474b0ae002d843920c38.jpg"
                      alt="">
                    <p class="m-0 bg-dark text-white text-center">test</p>
                  </figure>
                </a>
              </article>
              <article class="col-6 col-md-4">
                <a href="#">
                  <figure>
                    <img class="img-fluid" src=" https://img.anime-hiroba.com/04d91ca0048c474b0ae002d843920c38.jpg"
                      alt="">
                    <p class="m-0 bg-dark text-white text-center">test</p>
                  </figure>
                </a>
              </article>
              <article class="col-6 col-md-4">
                <a href="#">
                  <figure>
                    <img class="img-fluid" src="https://img.anime-hiroba.com/04d91ca0048c474b0ae002d843920c38.jpg"
                      alt="">
                    <p class="m-0 bg-dark text-white text-center">test</p>
                  </figure>
                </a>
              </article>
              <article class="col-6 col-md-4">
                <a href="#">
                  <figure>
                    <img class="img-fluid" src="https://img.anime-hiroba.com/04d91ca0048c474b0ae002d843920c38.jpg"
                      alt="">
                    <p class="m-0 bg-dark text-white text-center">test</p>
                  </figure>
                </a>
              </article>
              <article class="col-6 col-md-4">
                <a href="#">
                  <figure>
                    <img class="img-fluid" src=" https://img.anime-hiroba.com/04d91ca0048c474b0ae002d843920c38.jpg"
                      alt="">
                    <p class="m-0 bg-dark text-white text-center">test</p>
                  </figure>
                </a>
              </article>
              <article class="col-6 col-md-4">
                <a href="#">
                  <figure>
                    <img class="img-fluid" src="https://img.anime-hiroba.com/04d91ca0048c474b0ae002d843920c38.jpg"
                      alt="">
                    <p class="m-0 bg-dark text-white text-center">test</p>
                  </figure>
                </a>
              </article>
              <article class="col-6 col-md-4">
                <a href="#">
                  <figure>
                    <img class="img-fluid" src="https://img.anime-hiroba.com/04d91ca0048c474b0ae002d843920c38.jpg"
                      alt="">
                    <p class="m-0 bg-dark text-white text-center">test</p>
                  </figure>
                </a>
              </article>
              <article class="col-6 col-md-4">
                <a href="#">
                  <figure>
                    <img class="img-fluid" src=" https://img.anime-hiroba.com/04d91ca0048c474b0ae002d843920c38.jpg"
                      alt="">
                    <p class="m-0 bg-dark text-white text-center">test</p>
                  </figure>
                </a>
              </article>
              <article class="col-6 col-md-4">
                <a href="#">
                  <figure>
                    <img class="img-fluid" src="https://img.anime-hiroba.com/04d91ca0048c474b0ae002d843920c38.jpg"
                      alt="">
                    <p class="m-0 bg-dark text-white text-center">test</p>
                  </figure>
                </a>
              </article>
              <article class="col-6 col-md-4">
                <a href="#">
                  <figure>
                    <img class="img-fluid" src="https://img.anime-hiroba.com/04d91ca0048c474b0ae002d843920c38.jpg"
                      alt="">
                    <p class="m-0 bg-dark text-white text-center">test</p>
                  </figure>
                </a>
              </article>
              <article class="col-6 col-md-4">
                <a href="#">
                  <figure>
                    <img class="img-fluid" src=" https://img.anime-hiroba.com/04d91ca0048c474b0ae002d843920c38.jpg"
                      alt="">
                    <p class="m-0 bg-dark text-white text-center">test</p>
                  </figure>
                </a>
              </article>
              <article class="col-6 col-md-4">
                <a href="#">
                  <figure>
                    <img class="img-fluid" src="https://img.anime-hiroba.com/04d91ca0048c474b0ae002d843920c38.jpg"
                      alt="">
                    <p class="m-0 bg-dark text-white text-center">test</p>
                  </figure>
                </a>
              </article>
              <article class="col-6 col-md-4">
                <a href="#">
                  <figure>
                    <img class="img-fluid" src="https://img.anime-hiroba.com/04d91ca0048c474b0ae002d843920c38.jpg"
                      alt="">
                    <p class="m-0 bg-dark text-white text-center">test</p>
                  </figure>
                </a>
              </article>
              <article class="col-6 col-md-4">
                <a href="#">
                  <figure>
                    <img class="img-fluid" src=" https://img.anime-hiroba.com/04d91ca0048c474b0ae002d843920c38.jpg"
                      alt="">
                    <p class="m-0 bg-dark text-white text-center">test</p>
                  </figure>
                </a>
              </article>
            </div>
            <div class="tab-pane" id="thu">
              <p>textthu</p>
            </div>
          </span>
        </section>
        <section class="section p-3 mt-4 border">
          <h2 class="h2 p-2 text-white bg-danger">最近のコメント</h2>
          <div class="row">
            <article class="col-6 col-md-4">
              <a href="#">
                <figure>
                  <img class="img-fluid" src="https://img.anime-hiroba.com/04d91ca0048c474b0ae002d843920c38.jpg" alt="">
                </figure>
              </a>
            </article>
            <div class="col">
              <p>アニメ名</p>
              <p>投稿者名</p>
              <p>日付</p>
              <p>こめんとこめんとこめんと</p>
            </div>
          </div>
          <div class="row">
            <article class="col-6 col-md-4">
              <a href="#">
                <figure>
                  <img class="img-fluid" src="https://img.anime-hiroba.com/04d91ca0048c474b0ae002d843920c38.jpg" alt="">
                </figure>
              </a>
            </article>
            <div class="col">
              <p>アニメ名</p>
              <p>投稿者名</p>
              <p>日付</p>
              <p>こめんとこめんとこめんと</p>
            </div>
          </div>
          <div class="row">
            <article class="col-6 col-md-4">
              <a href="#">
                <figure>
                  <img class="img-fluid" src="https://img.anime-hiroba.com/04d91ca0048c474b0ae002d843920c38.jpg" alt="">
                </figure>
              </a>
            </article>
            <div class="col">
              <p>アニメ名</p>
              <p>投稿者名</p>
              <p>日付</p>
              <p>こめんとこめんとこめんと</p>
            </div>
          </div>
          <div class="row">
            <article class="col-6 col-md-4">
              <a href="#">
                <figure>
                  <img class="img-fluid" src="https://img.anime-hiroba.com/04d91ca0048c474b0ae002d843920c38.jpg" alt="">
                </figure>
              </a>
            </article>
            <div class="col">
              <p>アニメ名</p>
              <p>投稿者名</p>
              <p>日付</p>
              <p>こめんとこめんとこめんと</p>
            </div>
          </div>
        </section>
      </div>
      <div class="sidebar col-md-4">
        <aside class="aside border p-3 mb-3 bg-white">
          <h2 class="h2 bg-danger text-white p-2">アニメタイトル検索</h2>
          {{-- <div class=""> --}}
          <form class=" form-inline my-2 my-lg-0">
            <input class="input" type="text" name="keyword" placeholder="アニメを検索" value="">
            <input type="submit" value="">
          </form>
          {{-- </div> --}}
          <div class="mt-2 list-group list-group-horizontal text-center">
            <a class="py-2 px-1 col list-group-item flex-fill" href="#">あ</a>
            <a class="py-2 px-1 col list-group-item flex-fill" href="#">か</a>
            <a class="py-2 px-1 col list-group-item flex-fill" href="#">さ</a>
            <a class="py-2 px-1 col list-group-item flex-fill" href="#">た</a>
            <a class="py-2 px-1 col list-group-item flex-fill" href="#">な</a>
          </div>
          <div class="list-group list-group-horizontal text-center">
            <a class="py-2 px-1 col list-group-item flex-fill" href="#">は</a>
            <a class="py-2 px-1 col list-group-item flex-fill" href="#">ま</a>
            <a class="py-2 px-1 col list-group-item flex-fill" href="#">や</a>
            <a class="py-2 px-1 col list-group-item flex-fill" href="#">ら</a>
            <a class="py-2 px-1 col list-group-item flex-fill" href="#">わ</a>
          </div>
        </aside>
        <aside class=" aside border p-3 mb-3 bg-white">
          <h2 class="h2 bg-danger text-white p-2">放送中のアニメ</h2>
          <ul class="list-group" id="week">
            <li class="p-0 list-group-item">
              <span class="p-3 d-block bg-primary text-white text-center">日曜日</span>
              <ul class="d-none">
                <li><a href="/anime/aikatsu-planet/">アイカツプラネット！</a></li>
                <li><a href="/anime/ani-x-para-anata-no-hero-wa-dare-desu-ka/">アニ×パラ～あなたのヒーローは誰ですか～</a></li>
                <li><a href="/anime/kiratto-pri-chan/">キラッとプリ☆チャン</a></li>
                <li><a href="/anime/kingdom-3rd-season/">キングダム(第3シリーズ)</a></li>
                <li><a href="/anime/sayonara-cramer/">さよなら私のクラマー</a></li>
                <li><a href="/anime/jashin-chan-dropkick/">邪神ちゃんドロップキック</a></li>
                <li><a href="/anime/sevenknights/">セブンナイツ レボリューション -英雄の継承者-</a></li>
                <li><a href="/anime/sengoku-majin-goushougun/">戦国魔神ゴーショーグン</a></li>
                <li><a href="/anime/kisaragi/">戦闘員、派遣します！</a></li>
                <li><a href="/anime/dibetagurashi/">ぢべたぐらし あひるの生活</a></li>
                <li><a href="/anime/digimon-adventure-2020/">デジモンアドベンチャー：</a></li>
                <li><a href="/anime/duel-masters-king-2/">デュエル・マスターズ キング！</a></li>
                <li><a href="/anime/tori-precure/">トロピカル～ジュ！プリキュア</a></li>
                <li><a href="/anime/doraie/">ドラゴン、家を買う。</a></li>
                <li><a href="/anime/megalobox/">NOMAD メガロボクス2</a></li>
                <li><a href="/anime/boruto-naruto-next-generations/">BORUTO-ボルト- NARUTO NEXT GENERATIONS</a></li>
                <li><a href="/anime/mazicaparty/">マジカパーティ</a></li>
                <li><a href="/anime/yu-gi-oh-sevens/">遊☆戯☆王SEVENS</a></li>
                <li><a href="/anime/moriarty-2/">憂国のモリアーティ(2クール目)</a></li>
                <li><a href="/anime/one-piece/">ワンピース</a></li>
              </ul>
            </li>
            <li class="p-0 list-group-item">
              <span class="p-3 d-block bg-secondary text-white text-center">月曜日</span>
              <ul class="d-none">
                <li><a href="/anime/oddtaxi/">オッドタクシー</a></li>
                <li><a href="/anime/koikimo/">恋と呼ぶには気持ち悪い</a></li>
                <li><a href="/anime/higehiro/">ひげを剃る。そして女子高生を拾う。</a></li>
                <li><a href="/anime/fumetsunoanatae/">不滅のあなたへ</a></li>
                <li><a href="/anime/fruits-basket-the-final/">フルーツバスケット The Final</a></li>
                <li><a href="/anime/hetalia-axis-powers/">ヘタリア Axis Powers</a></li>
                <li><a href="/anime/marsred/">MARS RED</a></li>
                <li><a href="/anime/yakumo/">やくならマグカップも</a></li>

              </ul>
            </li>

            <li class="p-0 list-group-item">
              <span class="p-3 d-block bg-success text-white text-center">火曜日</span>
              <ul class="d-none ">
                <li><a href="/anime/gokudou-kun-manyuuki/">ゴクドーくん 漫遊記</a></li>
                <li><a href="/anime/shadowverse/">シャドウバース</a></li>
                <li><a href="/anime/joran/">擾乱 THE PRINCESS OF SNOW AND BLOOD</a></li>
                <li><a href="/anime/gto/">GTO</a></li>
                <li><a href="/anime/seijyonomaryoku/">聖女の魔力は万能です</a></li>
                <li><a href="/anime/tensura-nikki/">転生したらスライムだった件 転スラ日記</a></li>
                <li><a href="/anime/maicching-machiko-sensei/">まいっちんぐマチコ先生</a></li>

              </ul>
            </li>

            <li class="p-0 list-group-item">
              <span class="p-3 d-block bg-danger text-white text-center">水曜日</span>
              <ul class="d-none">
                <li><a href="/anime/osamake/">幼なじみが絶対に負けないラブコメ</a></li>
                <li><a href="/anime/fulldive/">究極進化したフルダイブRPGが現実よりもクソゲーだったら</a></li>
                <li><a href="/anime/supercub/">スーパーカブ</a></li>
                <li><a href="/anime/cestvs/">セスタス -The Roman Fighter-</a></li>
                <li><a href="/anime/nanatsu-no-taizai-hundo/">七つの大罪 憤怒の審判</a></li>

              </ul>
            </li>

            <li class="p-0 list-group-item">
              <span class="p-3 d-block bg-warning text-white text-center">木曜日</span>
              <ul class="d-none">
                <li><a href="/anime/isekaimaou/">異世界魔王と召喚少女の奴隷魔術Ω</a></li>
                <li><a href="/anime/godzilla-sp/">ゴジラ S.P</a></li>
                <li><a href="/anime/shamanking/">SHAMAN KING</a></li>
                <li><a href="/anime/zombielandsaga-ribenzi/">ゾンビランドサガ リベンジ</a></li>
                <li><a href="/anime/bakuten/">バクテン!!</a></li>
                <li><a href="/anime/f-ran/">Fairy蘭丸～あなたの心お助けします～</a></li>
              </ul>
            </li>

            <li class="p-0 list-group-item">
              <span class="p-3 d-block bg-info text-white text-center">金曜日</span>
              <ul class="d-none">
                <li><a href="/anime/meisakukun-3/">あはれ！名作くん(第3期)</a></li>
                <li><a href="/anime/meisakukun-4/">あはれ！名作くん(第4期)</a></li>
                <li><a href="/anime/meisakukun/">あはれ！名作くん</a></li>
                <li><a href="/anime/meisakukun-2/">あはれ！名作くん(第2期)</a></li>
                <li><a href="/anime/meisakukun-6/">あはれ！名作くん(第6期)</a></li>
                <li><a href="/anime/meisakukun-5/">あはれ！名作くん(第5期)</a></li>
                <li><a href="/anime/kumo/">蜘蛛ですが、なにか？</a></li>
                <li><a href="/anime/kabaddi/">灼熱カバディ</a></li>
                <li><a href="/anime/shinkalion/">新幹線変形ロボ シンカリオンZ THE ANIMATION</a></li>
                <li><a href="/anime/subarashiki/">すばらしきこのせかい The Animation</a></li>
                <li><a href="/anime/seikai-no-danshou-tanjou/">星界の断章 -誕生-</a></li>
                <li><a href="/anime/dynazenon/">SSSS.DYNAZENON</a></li>
                <li><a href="/anime/doraemon-1979/">ドラえもん</a></li>
                <li><a href="/anime/back-arrow/">バック・アロウ</a></li>
                <li><a href="/anime/bluereflection-ray/">BLUE REFLECTION RAY/澪</a></li>
                <li><a href="/anime/pokemon-2019/">ポケットモンスター(2019)</a></li>
                <li><a href="/anime/mashironooto/">ましろのおと</a></li>
                <li><a href="/anime/zorori-2/">もっと！まじめにふまじめ かいけつゾロリ(第2シリーズ)</a></li>
                <li><a href="/anime/youkai-watch2021/">妖怪ウォッチ♪</a></li>
              </ul>
            </li>

            <li class="p-0 list-group-item">
              <span class="p-3 d-block bg-dark text-white text-center">土曜日</span>
              <ul class="d-none">
                <li><a href="/anime/nagatorosan/">イジらないで、長瀞さん</a></li>
                <li><a href="/anime/vivy/">Vivy -Fluorite Eye's Song-</a></li>
                <li><a href="/anime/86/">86-エイティシックス-</a></li>
                <li><a href="/anime/sd-gundam-world/">SDガンダムワールド ヒーローズ</a></li>
                <li><a href="/anime/edens-zero/">EDENS ZERO</a></li>
                <li><a href="/anime/cf-vanguard-overdress/">カードファイト!! ヴァンガード overDress</a></li>
                <li><a href="/anime/shadowshouse/">シャドーハウス</a></li>
                <li><a href="/anime/slime300/">スライム倒して300年、知らないうちにレベルMAXになってました</a></li>
                <li><a href="/anime/tokyo-revengers/">東京リベンジャーズ</a></li>
                <li><a href="/anime/dq-dai/">ドラゴンクエスト ダイの大冒険(2020)</a></li>
                <li><a href="/anime/bakugan-new-vestroia/">爆丸バトルブローラーズ ニューヴェストロイア</a></li>
                <li><a href="/anime/daiundoukai-restart/">バトルアスリーテス大運動会 ReSTART!</a></li>
                <li><a href="/anime/bishonen-tanteidan/">美少年探偵団</a></li>
                <li><a href="/anime/boku-no-hero-academia-5th-season/">僕のヒーローアカデミア(第5期)</a></li>
                <li><a href="/anime/bonobono-2016/">ぼのぼの(2016)</a></li>
                <li><a href="/anime/mairimashita-iruma-kun-2/">魔入りました！入間くん(第2シリーズ)</a></li>
                <li><a href="/anime/detective-conan/">名探偵コナン</a></li>
                <li><a href="/anime/lego_monkiekid/">レゴ モンキーキッド</a></li>
              </ul>
            </li>
          </ul>
        </aside>
      </div>
  </main>
  </div>
  <footer class="footer bg-light bg-dark pt-3">
    <h2 class="h2 text-center text-white">アニメまとめ</h2>
    <small class="d-block text-center text-white bg-dark m-0">Copyright © Since 2018 - 2021 アニメ広場. All Rights
      reserved.</small>
  </footer>
  <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
