Para integrar o Painel Flow Stream, você precisa seguir 4 passos:
1- Gerar Api
2- Enviar os arquivos para o servidor
3- Criar/Configurar servidor no whmcs
4- Criar/Configurar o produto.

1- Para gerar a api, você precisa acessar o painel de sua revenda. 
Acesse o painel da sua revenda, procure pelo menu API e clique em gerar api.
Após clicar, salve a Api gerada.

2- Envie a pasta grandpanelst para a pasta module>> servers do seu whmcs.

3- Vá no painel de admin do seu whmcs. Procure por Opções >> Produtos/Servicos >> Servidores.
Clique em Add NewServer e preencha os campos com os seguintes dados:

Nome: Nome do Servidor, ex: Flow Stream 
Servidor : streamcast.ml (ou outro domínio fornecido por você e autorizado pela nossa equipe) 
Tipo: Grandpanelst
Nome de Usuário: Nome de usuário da sua revenda 
Senha: A sua api gerada e clique em salvar

4- Crie um novo grupo e produto 
Para isso vá em Opções >> Produtos/Servicos >> Produtos/Servicos 
Clique em Criar um Novo Grupo
Digite um nome do grupo do plano que será criado no campo Nome do Grupo de Produtos e clique em salvar.....

Vamos agora, criar o produto

Clique em Criar um novo Produto e preenche os campos com os seguintes dados: 
Tipo do Produto: Outro Produto/Servico 
Grupo de Produtos: Nome do grupo que criou 
Nome do Produto: Nome do plano de streaming
Clique em Continuar

Vá no menu Configuração do Modulo Em Nome do Módulo, escolha Grandpanelst 
Após selecionar o modulo, irá apresentar as opções de recursos que o plano terá. 
Preencha os campos seguindo os padrões/explicacoes exibidas e clique em Salvar.


#Suporte no WHMCS 7 PHP5.6+
