function irparagerar() {
    window.location.href="gerar.php";

}

//JS PARA ESCONDE/MOSTRAR CONTEUDO ADICIONAL E BOTAO ENVIADO

document.getElementById('formDados').addEventListener('submit', function(event) {
    event.preventDefault(); //ANT RELOAD

    if (this.checkValidity()) {
        const check = document.getElementById('checkSucesso1');
        check.classList.add('ativo');

      //MONSTA CONTEUDO ADICONAL
      const conteudoAdicional = document.getElementById('conteudoAdicional');
      conteudoAdicional.style.display = 'block';

      //SCROLLA
      conteudoAdicional.scrollIntoView({ behavior: 'smooth', block: 'start' });

      setTimeout(() => {
        window.scrollBy(0, -100);
      }, 600); 

    } else {
      //MOSTRA ERROS
      this.reportValidity();
    }
  });


//BOTAO ENVIADO CONTEUDO ADICIONAL
document.getElementById('formDados2').addEventListener('submit', function(e) {
  e.preventDefault();

  if (this.checkValidity()) {
    const check = document.getElementById('checkSucesso2');
    check.classList.add('ativo');

     //MOSTRAR O RESTANTE
    const restante = document.getElementById('conteudoRestante');
    restante.style.display = 'block';

    //ROLAMENTO
    setTimeout(() => {
      restante.scrollIntoView({ behavior: 'smooth', block: 'start' });
      setTimeout(() => window.scrollBy(0, -100), 600); // ajuste fino
    }, 300);
  }
});

//BOTAO OBJETIVOS
document.getElementById('formDados3').addEventListener('submit', function(e) {
  e.preventDefault();

  if (this.checkValidity()) {
    const check = document.getElementById('checkSucesso3');
    check.classList.add('ativo');
  }
});

//BOTAO DE REMOVER
function removerItem(botao) {
      const item = botao.parentElement;
      item.remove();
    }

    //FORMACOES
    function adicionarFormacao() {
    const curso = document.getElementById("curso").value.trim();
    const instituicao = document.getElementById("instituicao").value.trim();
    const ano = document.getElementById("anoConclusao").value.trim();
    if (!curso || !instituicao || !ano) {
        alert("Por favor, preencha todos os campos da formação acadêmica.");
        return;
    }

  //CONTAINER FORMACOES
  const divFormacao = document.createElement("div");
  divFormacao.className = "formacao-item fade-in";
  divFormacao.innerHTML = `
    <h2 class="h2container">Curso: ${curso}</h2>
    <h2 class="h2container">Instituição:${instituicao}</h2>
    <h2 class="h2container">Ano de Conclusão:${ano}</h2>
    <button class="button3" onclick="removerItem(this)">
      <i class="bi bi-trash-fill"></i> Remover
    </button>
`;
    //ADD NA LISTA
    document.getElementById("listaFormacoes").appendChild(divFormacao);

    //ZERA OS CAMPOS
    document.getElementById("curso").value = "";
    document.getElementById("instituicao").value = "";
    document.getElementById("anoConclusao").value = "";

    //SCROLLA ATE AS ADD
    document.getElementById("listaFormacoes").scrollIntoView({ behavior: "smooth", block: "center" });
  } 
    
    

    //QUALIFICAS
    function adicionarQuali() {
    const curso2 = document.getElementById("curso2").value.trim();
    const instituicao2 = document.getElementById("instituicao2").value.trim();
    const ano2 = document.getElementById("anoConclusao2").value.trim();
    if (!curso2 || !instituicao2 || !ano2) {
        alert("Por favor, preencha todos os campos da qualificacao.");
        return;
    }

    //CONTAINER QUALI
  const divQuali = document.createElement("div");
  divQuali.className = "quali-item fade-in";
  divQuali.innerHTML = `
    <h2 class="h2container">Curso:${curso2}</h2>
    <h2 class="h2container">Instituição:${instituicao2}</h2>
    <h2 class="h2container">Ano de Conclusão:${ano2}</h2>
    <button class="button3" onclick="removerItem(this)">
      <i class="bi bi-trash-fill"></i> Remover
    </button>   
`;

    //ADD NA LISTA
    document.getElementById("listaQuali").appendChild(divQuali);

    //ZERA CAMPOS
    document.getElementById("curso2").value = "";
    document.getElementById("instituicao2").value = "";
    document.getElementById("anoConclusao2").value = "";

    //SCROLLA ATE AS ADD
    document.getElementById("listaQuali").scrollIntoView({ behavior: "smooth", block: "center" });
  } 
      



    //BOTAO BAIXAR CURRI APOS ENVIAR OBJT.
document.getElementById('formDados3').addEventListener('submit', function(e) {
  e.preventDefault();

  if (this.checkValidity()) {
    const check = document.getElementById('checkSucesso3');
    check.classList.add('ativo');

    // MOSTRA BOTAO GERAR CURRI
    document.getElementById('botaoCurriculo').style.display = 'block';

    // SCROLL ATE O BOTAO
    setTimeout(() => {
      document.getElementById('botaoCurriculo').scrollIntoView({ behavior: 'smooth', block: 'start' });
    }, 400);
  }
});


document.getElementById('gerarCurriculo').addEventListener('click', function() {
  // COLETA DADOS DO FORMULARIOS
  const dados1 = Object.fromEntries(new FormData(document.getElementById('formDados')).entries());
  const dados2 = Object.fromEntries(new FormData(document.getElementById('formDados2')).entries());
  const dados3 = Object.fromEntries(new FormData(document.getElementById('formDados3')).entries());

  // COLETA FORMACOES E QUALIS
const formacoes = Array.from(document.querySelectorAll('#listaFormacoes .formacao-item')).map(div =>
  Array.from(div.querySelectorAll('h2')).map(h2 => h2.innerText.trim())
);

  const qualificacoes = Array.from(document.querySelectorAll('#listaQuali .quali-item')).map(div =>
  Array.from(div.querySelectorAll('h2')).map(h2 => h2.innerText.trim())
);

  // JUNTA TUDO
  const dadosCompletos = { ...dados1, ...dados2, ...dados3, formacoes, qualificacoes };

  // ENVIA PRO PHP MONTAR
  fetch('curriculo.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(dadosCompletos)
  })
  .then(res => res.text())
  .then(html => {
    const novaJanela = window.open('', '_blank');
    novaJanela.document.write(html);
    novaJanela.document.close();
  })
  .catch(err => alert('Erro ao gerar currículo: ' + err));
});


