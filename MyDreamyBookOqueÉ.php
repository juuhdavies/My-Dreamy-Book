<?php
require('Persistence.php');
$comment_post_ID = 1;
$db = new Persistence();
$comments = $db->get_comments($comment_post_ID);
$has_comments = (count($comments) > 0);
?>


<!DOCTYPE html>
<html>
    <head>
        <title>My Dreamy Book</title>
        <meta charset="UTF-8">
        <meta name="description" content="Blog literário">
        <meta name="keywords" content="livros, romances, literatura, resenha">
        <meta name="author" content="Julia Davies">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <style>
        h1{
            text-align: center;
            font-family: mama;
            font-size: 500%;
        }
        @font-face{
            font-family: mama;
            src: url(mama.otf);
        }
        @font-face{
            font-family: cocogoose;
            src: url(cocogoose.ttf);
        }
        @font-face{
            font-family: brusher;
            src: url(brusher.ttf)
        }
        h3{
            font-family: cocogoose;
            text-align: center;
        }
        header{
            background-image: url(https://user-images.githubusercontent.com/62300527/79382927-b5042580-7f3a-11ea-95e5-f01a28473276.png), url(https://user-images.githubusercontent.com/62300527/79383184-2643d880-7f3b-11ea-9731-5f7f03972ea1.png), url(https://user-images.githubusercontent.com/62300527/79383208-2e9c1380-7f3b-11ea-89d1-a77962bb80ab.png);
            background-position: 270px, 970px, center;
            background-position-y: center, center, 110px;
            background-repeat: no-repeat;
            background-size: 10%;
            
        }
        a{
            color: black;
            text-decoration: none;
            font-family: "cocogoose";
        }
        nav{
            border: 1px solid rgb(216, 146, 140);
            padding: 10px 0px;
            margin: auto;
            background-color: rgb(239, 156, 148);
            text-align: center;
        }
        .nav-item{
            margin: 0 60px;
        }
        h2{
            color: black;
            font-family: brusher;
            font-size: 250%;
            text-align: center;
        }
        p{
            font-family: cocogoose;
            text-align: justify;
        }
        h4{
            font-family: brusher;
            color: black;
            text-align: center;
            font-size: 150%;
        }
        section{
            margin: 40px;
        }
        #respond {
            margin-top: 40px;
        }

        #respond input[type='text'],
        #respond input[type='email'], 
        #respond textarea {
            margin-bottom: 10px;
            display: block;
            width: 100%;

            border: 1px solid rgba(0, 0, 0, 0.1);
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            -o-border-radius: 5px;
            -ms-border-radius: 5px;
            -khtml-border-radius: 5px;
            border-radius: 5px;

            line-height: 1.4em;
        }
        form{
            font-family: cocogoose;
        }
    </style>
    <header>
        <h1>My Dreamy Book</h1>
        <h3>Bem Vindos Ao Meu Blog Literário</h3>
    </header>
    <nav>
        <a class="nav-item" href="index.html">Início</a>
        <a class="nav-item" href="MyDreamBookResenhas.html">Resenhas</a>
        <a class="nav-item" href="MyDreamBookRecomendações.html">Recomendações</a>
        <a class="nav-item" href="MyDreamBookFavoritos.html">Favoritos</a>
        <a class="nav-item" href="MyDreamBookTags.html">Tags</a>
        <a class="nav-item" href="MyDreamBookCuriosidades.html">Curiosidades</a>
    </nav>
    <body>
        <section>
            <h2>My Dreamy Book, Apresentando:</h2>
            <p>
                My Dreamy Book é um projeto de um blog literário. Eu sempre fui apaixonada por livros
                e pensei em criar este site para que poder compartilhar meu amor por livros com as
                pessoas. Neste blog estarei postando: resenhas, tags, irei recomendar autores, livros e filmes,
                algumas curiosidades sobre livros e os cenários em que se passam.
            </p>
            <img url="https://user-images.githubusercontent.com/62300527/79383208-2e9c1380-7f3b-11ea-89d1-a77962bb80ab.png">
            <h4>Sobre Mim</h4>
            <p>
                Meu nome é Julia e eu sou praticamente viciada em livros, não há coisa no mundo que eu goste
                mais. A cada dia um livro novo, um surto diferente. Um dos meus gêneros literários favorito é
                romance, principalmente os de época. Sou incapaz de escolher qualquer livro para que seja meu favorito, mas,
                alguns que merecem menção honrosa são: Obsidiana(saga Lux, primeiro livro), Rainha Vermelha, O duque e eu(Bridgertons, primeiro livro),
                Um Sedutor sem Coração(Ravenels, primeiro livro), entre muitos outros que compõe minha lista de leituras.
                Além de livros, que sempre serão meu maior vicío, gosto de alguns animes, entre ele: Tokyo Ghoul, Fairy Tail,
                Boku No Hero Academy, Another, Akamega Kill, etc. 
                Uma curiosidade sobre minha pessoa é que eu mantenho uma lista de cada personagem que eu odeio dos livros,
                não necessariamente os vilões, por mais que em sua maioria a lista seja composta por eles. Alguns vilões, como o Maven,
                entraram pra minha outra gigante lista de crushs literários.
                Esta apresentação ficou boa? Espero que sim, agradeço por ter lido.
            </p>
        </section>
        <section id="comments" class="body">
	  
            <header>
                  <h2>Comments</h2>
              </header>
      
          <ol id="posts-list" class="hfeed<?php echo($has_comments?' has-comments':''); ?>">
            <li class="no-comments">Be the first to add a comment.</li>
            <?php
              foreach ($comments as &$comment) {
                ?>
                <li><article id="comment_<?php echo($comment['id']); ?>" class="hentry">	
                          <footer class="post-info">
                              <abbr class="published" title="<?php echo($comment['date']); ?>">
                                  <?php echo( date('d F Y', strtotime($comment['date']) ) ); ?>
                              </abbr>
      
                              <address class="vcard author">
                                  By <a class="url fn" href="#"><?php echo($comment['comment_author']); ?></a>
                              </address>
                          </footer>
      
                          <div class="entry-content">
                              <p><?php echo($comment['comment']); ?></p>
                          </div>
                      </article></li>
                <?php
              }
            ?>
              </ol>
              
              <div id="respond">
      
            <h3>Leave a Comment</h3>
      
            <form action="post_comment.php" method="post" id="commentform">
      
              <label for="comment_author" class="required">Your name</label>
              <input type="text" name="comment_author" id="comment_author" value="" tabindex="1" required="required">
              
              <label for="email" class="required">Your email</label>
              <input type="email" name="email" id="email" value="" tabindex="2" required="required">
      
              <label for="comment" class="required">Your message</label>
              <textarea name="comment" id="comment" rows="10" tabindex="4"  required="required"></textarea>
      
              <input type="hidden" name="comment_post_ID" value="<?php echo($comment_post_ID); ?>" id="comment_post_ID" />
              <input name="submit" type="submit" value="Submit comment" />
              
            </form>
            
          </div>
                  
          </section>
    </body>
</html>