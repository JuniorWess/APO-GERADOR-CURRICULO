<?php
header('Content-Type: text/html; charset=utf-8');

$dados = json_decode(file_get_contents('php://input'), true);
if (!$dados) {
  die('Nenhum dado recebido.');
}

function calcularIdade($dataNascimento) {
  if (empty($dataNascimento)) return '';
  $dataNascimento = new DateTime($dataNascimento);
  $hoje = new DateTime();
  return $hoje->diff($dataNascimento)->y;
}

$idade = calcularIdade($dados['nascimento']);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Currículo de <?php echo $dados['primeiroNome'] . ' ' . $dados['sobrenome']; ?></title>

<style>

  * {
    -webkit-print-color-adjust: exact !important;
    print-color-adjust: exact !important;
    box-sizing: border-box;
  }

  body {
    background: #f7f7f7;
    margin: 0;
    padding: 0;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 13px;
    line-height: 1.3;
    color: #222;
  }

  /*ÁREA DO CURRI*/
  #curriculo {
    background: #fff;
    color: #000;
    width: 800px;
    max-width: 100%;
    margin: 20px auto;
    padding: 30px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.3);
    border-radius: 8px;
  }


  h1 {
    font-size: 26px;
    color: #2c3e50;
    border-bottom: 2px solid #2c3e50;
    padding-bottom: 8px;
    margin-bottom: 20px;
  }

  h2 {
    font-size: 20px;
    color: #ffbb00;
    border-left: 5px solid #a77f0e;
    padding-left: 8px;
    margin-top: 25px;
    margin-bottom: 10px;
  }

  h3 {
    font-size: 38px;
    color: #ffbb00;
    border-left: 5px solid #a77f0e;
    padding-left: 8px;
    margin-top: 25px;
    margin-bottom: 10px;
  }


  #curriculo h2 {
    font-size: 15px;
    margin: 15px 0 5px;
  }

  #curriculo p,
  #curriculo h4 {
    font-size: 13px;
    line-height: 1.4;
    margin: 3px 0;
    word-wrap: break-word;
    white-space: pre-wrap;
  }

  h4 {
    margin: 4px 0;
    color: #805e00;
    border: 1px solid black;
    padding: 4px;
    width: 500px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.3);
  }

  #curriculo p strong,
  strong {
    color: #805e00;
    white-space: pre-wrap;
    word-wrap: break-word;
    overflow: visible !important;
  }


  hr {
    border: none;
    border-top: 1px solid #ccc;
    margin: 20px 0;
  }

  /*ESPAÇAMENTO ENTRE BLOCOS*/
  div {
    margin-bottom: 10px;
  }


  button {
    background: #ffbb00;
    color: #fff;
    border-radius: 10px;
    border: 1px solid #fff;
    padding: 10px;
    margin-top: 20px;
    cursor: pointer;
    transition: 0.5s;
    font-size: 18px;
  }

  button:hover {
    background: #a77f0e;
    color: #fff;
  }

  /*IMPRESSÃO*/
  @media print {
    body {
      background: #fff !important;
      -webkit-print-color-adjust: exact !important;
      print-color-adjust: exact !important;
      margin: 0;
      padding: 0;
      zoom: 90%;
    }

    #curriculo {
      background: #fff !important;
      box-shadow: none !important;
      border-radius: 0 !important;
      margin: 0 auto !important;
      width: 800px !important;
      max-width: 100% !important;
      padding: 30px !important;
      color: #000 !important;
    }

    button {
      display: none !important;
    }

    /* Remove cabeçalhos e rodapés do nav*/
    @page {
      size: A4;
      margin: 0;
    }
  }
</style>

</head>
<body>

<div id="curriculo">

  <h3><?php echo $dados['primeiroNome'] . ' ' . $dados['sobrenome']; ?></h3>
  <hr>

  <h2>Dados Pessoais</h2>
  <p><strong>Email:</strong> <?php echo $dados['email']; ?></p>
  <p><strong>Telefone:</strong> <?php echo $dados['telefone']; ?></p>
  <p><strong>Celular:</strong> <?php echo $dados['celular']; ?></p>
  <p><strong>Endereço:</strong> <?php echo $dados['endereco']; ?>, <?php echo $dados['numero']; ?> - <?php echo $dados['bairro']; ?> - <?php echo $dados['cidade']; ?>/<?php echo $dados['estado']; ?></p>
  <p><strong>CEP:</strong> <?php echo $dados['cep']; ?></p>

  <h2>Informações Adicionais</h2>
  <p><strong>Naturalidade:</strong> <?php echo $dados['naturalidade']; ?></p>
  <p><strong>Nacionalidade:</strong> <?php echo $dados['nacionalidade']; ?></p>
  <p><strong>Idade:</strong> <?php echo $idade; ?> Anos</p>
  <p><strong>Estado Civil:</strong> <?php echo $dados['estadoCivil']; ?></p>
  <p><strong>Gênero:</strong> <?php echo $dados['genero']; ?></p>
  <p><strong>CNH:</strong> <?php echo $dados['cnh']; ?></p>

  <h2>Formação Acadêmica</h2>
  <?php
  if (!empty($dados['formacoes'])) {
    foreach ($dados['formacoes'] as $formacao) {
      echo "<div>";
      foreach ($formacao as $item) {
        echo "<h4>$item</h4>";
      }
      echo "</div><hr>";
    }
  } else {
    echo "<h4>Nenhuma formação informada.</h4>";
  }
  ?>

  <h2>Cursos e Qualificações</h2>
  <?php
  if (!empty($dados['qualificacoes'])) {
    foreach ($dados['qualificacoes'] as $qualificacao) {
      echo "<div>";
      foreach ($qualificacao as $item) {
        echo "<h4>$item</h4>";
      }
      echo "</div><hr>";
    }
  } else {
    echo "<h4>Nenhuma qualificação informada.</h4>";
  }
  ?>

  <h2>Objetivo Profissional</h2>
  <p><strong><?php echo nl2br($dados['objetivo']); ?></strong></p>

</div>

<hr>
<div style="text-align:center; margin-bottom:30px;">
  <button onclick="window.print()">Imprimir Currículo</button>
  <button id="gerarPDF">Baixar PDF</button>
</div>

<!-- Bibliotecas jsPDF e html2canvas -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

<script>

document.getElementById('gerarPDF').addEventListener('click', async function() {
  const { jsPDF } = window.jspdf;
  const element = document.getElementById('curriculo');

  // CLONA O CURRI
  const clone = element.cloneNode(true);
  clone.style.width = '900px';
  clone.style.background = '#ffffff';
  clone.style.boxShadow = 'none';
  clone.style.borderRadius = '0';
  document.body.appendChild(clone);

  //RENDER OBJETIVOS
  const objetivo = clone.querySelector('h2:nth-of-type(4) + p strong');
  if (objetivo) {
    objetivo.style.whiteSpace = 'pre-wrap';
    objetivo.style.wordWrap = 'break-word';
    objetivo.style.display = 'block';
    objetivo.style.overflow = 'visible';
    objetivo.style.position = 'relative';
    objetivo.style.zIndex = '1';
    objetivo.style.maxWidth = '100%';
  }

  //AGUARDA RENDERZIZAR
  await new Promise(r => setTimeout(r, 700));

  //PEGA COM ALTURA TOTAL
  const totalHeight = clone.scrollHeight;
  const totalWidth = clone.scrollWidth;

  try {
    const canvas = await html2canvas(clone, {
      scale: 4,
      useCORS: true,
      backgroundColor: '#ffffff',
      scrollY: 0,
      windowWidth: totalWidth,
      windowHeight: totalHeight,
      height: totalHeight
    });

    const imgData = canvas.toDataURL('image/png');
    const pdf = new jsPDF('p', 'pt', 'a4');
    const pageWidth = pdf.internal.pageSize.getWidth();
    const pageHeight = pdf.internal.pageSize.getHeight();
    const margin = 20;
    const imgWidth = pageWidth - margin * 2;
    const imgHeight = (canvas.height * imgWidth) / canvas.width;

    let heightLeft = imgHeight;
    let sourceY = 0;
    const ratio = canvas.width / imgWidth;
    const pageHeightPx = (pageHeight - margin * 2) * ratio;

    while (heightLeft > 0) {
      const pageCanvas = document.createElement('canvas');
      const pageCtx = pageCanvas.getContext('2d');
      pageCanvas.width = canvas.width;
      pageCanvas.height = Math.min(pageHeightPx, canvas.height - sourceY);

      pageCtx.drawImage(
        canvas,
        0, sourceY, canvas.width, pageCanvas.height,
        0, 0, canvas.width, pageCanvas.height
      );

      const pageData = pageCanvas.toDataURL('image/png');

      if (sourceY > 0) pdf.addPage();
      pdf.addImage(pageData, 'PNG', margin, margin, imgWidth, (pageCanvas.height / ratio));

      heightLeft -= pageCanvas.height;
      sourceY += pageCanvas.height;
    }

    const nome = "<?php echo $dados['primeiroNome'] . '_' . $dados['sobrenome']; ?>";
    pdf.save(`curriculo_${nome}.pdf`);
  } catch (err) {
    console.error('Erro ao gerar PDF:', err);
    alert('Erro ao gerar PDF. Veja o console para mais detalhes.');
  } finally {
    document.body.removeChild(clone);
  }
});
</script>


</body>
</html>
