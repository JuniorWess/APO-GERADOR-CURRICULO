<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stilo.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <title>GerarCurry</title>
</head>

<body>
    <?php include 'cabes.php';?>
    
    <h2 class="h2gerar">
        <i class="bi bi-person-vcard"></i>Dados Gerais
    </h2>

    <form id="formDados" method="POST">

        <div class="form-campo">
            <label for="primeiroNome">Primeiro Nome</label>
            <input type="text" id="primeiroNome" name="primeiroNome" required />
        </div>

        <div class="form-campo">
            <label for="sobrenome">Sobrenome</label>
            <input type="text" id="sobrenome" name="sobrenome" required />
        </div>

        <div class="form-campo">
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" placeholder="exemplo@email.com" required />
        </div>

        <div class="form-campo">
            <label for="telefone">Telefone</label>
            <input type="tel" id="telefone" name="telefone" placeholder="(00) 0000-0000" />
        </div>

        <div class="form-campo">
            <label for="celular">Celular</label>
            <input type="tel" id="celular" name="celular" placeholder="(00) 00000-0000" />
        </div>

        <div class="form-campo">
            <label for="endereco">Endereço</label>
            <input type="text" id="endereco" name="endereco" />
        </div>

        <div class="form-campo">
            <label for="cep">CEP</label>
            <input type="text" id="cep" name="cep" />
        </div>

        <div class="form-campo">
            <label for="numero">Número</label>
            <input type="text" id="numero" name="numero" />
        </div>


        <div class="form-campo">
            <label for="complemento">Complemento</label>
            <input type="text" id="complemento" name="complemento" />
        </div>

        <div class="form-campo">
           <label for="bairro">Bairro</label>
            <input type="text" id="bairro" name="bairro" />
        </div>

        <div class="form-campo">
            <label for="cidade">Cidade</label>
            <input type="text" id="cidade" name="cidade" />
        </div>

        <div class="form-campo">
            <label for="estado">Estado</label>
            <input type="text" id="estado" name="estado" />
        </div>

        <div class="form-campo">
          <input class="button2" type="submit" value="Enviar" />
          <div id="checkSucesso1" class="check-sucesso">✅ ENVIADO!</div>
        </div>
      </form> 

<div id="conteudoAdicional" style="display: none;">
      
      <h2 class="h2gerar"><i class="bi bi-person-plus-fill"></i> Informações Adicionais</h2>

    <form id="formDados2" method="POST">
          
          <div class="form-campo">
          <label for="naturalidade">Naturalidade</label>
          <input type="text" id="naturalidade" name="naturalidade" />
          </div>

          <div class="form-campo">
          <label for="nacionalidade">Nacionalidade</label>
          <input type="text" id="nacionalidade" name="nacionalidade" placeholder="Ex.: brasileira" />
          </div>

          <div class="form-campo">
          <label for="nascimento">Nascimento</label>
          <input type="date" id="nascimento" name="nascimento" />
          </div>

          <div class="form-campo">
          <label for="estadoCivil">Estado Civil</label>
          <select id="estadoCivil" name="estadoCivil">
              <option value="Solteiro(a)">Solteiro(a)</option>
              <option value="Casado(a)">Casado(a)</option>
              <option value="Divorciado(a)">Divorciado(a)</option>
              <option value="Viúvo(a)">Viúvo(a)</option>
          </select> 
          </div>

          <div class="form-campo">
            <label for="genero">Gênero</label>
            <select id="genero" name="genero">
              <option value="Masculino">Masculino</option>
              <option value="Feminino">Feminino</option>
              <option value="Outro">Outro</option>
              <option value="Prefiro não informar">Prefiro não informar</option>
            </select>
          </div>

          <div class="form-campo">
            <label for="cnh">Possui CNH?</label>
            <select id="cnh" name="cnh">
              <option value="">Selecione</option>
              <option value="Não possuo">Não possuo</option>
              <option value="Categoria A">Categoria A</option>
              <option value="Categoria B">Categoria B</option>
              <option value="Categoria AB">Categoria AB</option>
              <option value="Categoria C">Categoria C</option>
              <option value="Categoria D">Categoria D</option>
              <option value="Categoria E">Categoria E</option>
            </select>
          </div>
        
          <div class="form-campo">
            <input class="button3" type="submit" value="Enviar" />
            <div id="checkSucesso2" class="check-sucesso">✅ ENVIADO!</div>
          </div>                          
    </form>
</div>

<div id="conteudoRestante" style="display: none;">
    <h2 class="h2gerar"><i class="bi bi-journal-bookmark"></i>Formacao Academica</h2>

  <div id="formacoesContainer">
    <div class="form-campo">
      <label for="curso">Curso</label>
      <input type="text" id="curso" placeholder="Ex: Engenharia de Software" />
    </div>

    <div class="form-campo">
      <label for="instituicao">Instituição</label>
      <input type="text" id="instituicao" placeholder="Ex: UNIPAR" />
    </div>

    <div class="form-campo">
      <label for="anoConclusao">Ano de Conclusão</label>
      <input type="text" id="anoConclusao" placeholder="Ex: 2025" />
    </div>

    <button class="button3" onclick="adicionarFormacao()">Adicionar Formação</button>

    <h2 class="h2gerar"><i class="bi bi-plus-square-fill"></i>Formações Adicionadas:</h2>
    <div id="listaFormacoes"></div>
  </div>



    <h2 class="h2gerar"><i class="bi bi-journal-plus"></i>Cursos e Qualificacoes</h2>
  <div id="QualiContainer">
    <div class="form-campo">
      <label for="curso">Curso</label>
      <input type="text" id="curso2" placeholder="Ex: Ingles" />
    </div>

    <div class="form-campo">
      <label for="instituicao">Instituição</label>
      <input type="text" id="instituicao2" placeholder="Ex: Fisk" />
    </div>

    <div class="form-campo">
      <label for="anoConclusao">Ano de Conclusão</label>
      <input type="text" id="anoConclusao2" placeholder="Ex: 2025" />
    </div>

    <button class="button3" onclick="adicionarQuali()">Adicionar Qualificacao</button>

    <h2 class="h2gerar"><i class="bi bi-plus-square-fill"></i>Qualificacoes Adicionadas:</h2>
    <div id="listaQuali"></div>
  


    <h2 class="h2gerar">Objetivo Profissional</h2>

    <form id="formDados3" method="POST">

      <div class="form-group">
        <label for="objetivo">Descreva seu objetivo profissional:</label><br>
        <textarea id="objetivo" name="objetivo" placeholder="Ex: Atuar na área de desenvolvimento web, focando em front-end e interfaces intuitivas..." rows="5" maxlength="500" required></textarea>
      </div>
    

      <div class="form-campo">
          <input class="button2" type="submit" value="Enviar" />
          <div id="checkSucesso3" class="check-sucesso">✅ ENVIADO!</div>
        </div>
    </form>
    
</div>

    <div id="botaoCurriculo" style="display:none;">
        <button class="buttongera" id="gerarCurriculo">Ver Currículo Formatado</button>
    </div>      



<script src="script.js"></script>
</body>

</html>