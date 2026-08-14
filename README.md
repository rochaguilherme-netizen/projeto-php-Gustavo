conexao.php

O conexao.php é usado para conectar o sistema ao banco de dados. Nele são definidas as informações necessárias para essa conexão, como o localhost, o usuário root, a senha e o banco login. Depois, o new mysqli tenta realizar essa conexão. O código também verifica o connect_error, que serve para saber se houve algum problema ao tentar conectar. Então, de forma simples, esse arquivo prepara o acesso que o restante do sistema vai precisar para conseguir trabalhar com o banco. 

index.php

O index.php é onde acontece o login. Primeiro ele inclui o conexao.php para poder usar a conexão com o banco. Quando o usuário envia o formulário, o código verifica se o e-mail e a senha foram preenchidos. Depois pega esses valores e faz uma consulta na tabela usuarios, procurando um cadastro que tenha aqueles dados. O num_rows é usado para conferir quantos resultados apareceram. Quando encontra exatamente um usuário, o sistema pega os dados dele, inicia a sessão e guarda o id e o nome usando $_SESSION. Por fim, o header leva o usuário para o painel.php. 

protect.php

O protect.php é uma parte de segurança do sistema. Ele verifica se a sessão está iniciada e depois confere se existe um id dentro dela. Esse id é importante porque foi salvo quando o usuário conseguiu fazer login. Então, se o id não estiver na sessão, o código entende que não existe um usuário logado e impede a entrada na página. É esse arquivo que evita que alguém consiga acessar o painel sem passar pelo login. 

painel.php

O painel.php é a página que o usuário acessa depois de entrar na conta. A primeira coisa importante é o include('protect.php'), porque ele faz a verificação para saber se o usuário está logado antes de mostrar o painel. Depois, o código usa $_SESSION["nome"] para pegar o nome que foi salvo durante o login e mostrar na mensagem de boas-vindas. No final, existe um link para o logout.php, que é o responsável por encerrar a sessão quando o usuário decide sair. 

logout.php

O logout.php é responsável por finalizar o acesso do usuário. Ele primeiro garante que a sessão esteja iniciada e depois usa o session_destroy(), que é a parte principal desse arquivo. Esse comando destrói a sessão que estava mantendo as informações do usuário logado. Depois que isso acontece, o header manda o usuário novamente para o index.php. Então, quando a pessoa clica em sair, a sessão é encerrada e ela volta para a tela de login. 

Resumo

No funcionamento geral, primeiro o sistema se conecta ao banco através do conexao.php. Depois o usuário coloca seus dados no index.php, que verifica se existe uma conta correspondente e, se estiver tudo certo, cria uma sessão. Essa sessão é usada pelo protect.php para confirmar que o usuário está logado e pelo painel.php para mostrar informações como o nome da pessoa. Quando o usuário decide sair, o logout.php destrói essa sessão e manda ele de volta para o login. Então, cada arquivo tem uma função diferente, mas todos dependem uns dos outros para o sistema de login funcionar corretamente.
