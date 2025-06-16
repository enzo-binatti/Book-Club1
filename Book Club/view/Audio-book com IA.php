<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Audio Book com IA | Book Club</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css ">
  <link href="https://fonts.googleapis.com/css2?family=Inter :wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --primary: #6C5CE7;
      --primary-dark: #5649C0;
      --secondary: #00B894;
      --accent: #FD79A8;
      --dark: #2D3436;
      --light: #F5F6FA;
      --gray: #636E72;
      --light-gray: #DFE6E9;
      --success: #00B894;
      --error: #D63031;
      --warning: #FDCB6E;
      --border-radius: 16px;
      --border-radius-sm: 8px;
      --box-shadow: 0 10px 10px rgba(0, 0, 0, 0.08);
      --transition: all 0.25s cubic-bezier(0.645, 0.045, 0.355, 1);
    }
    
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    
    body {
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
      background-color: var(--light);
      color: var(--dark);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
      line-height: 1.6;
    }
    
    .container {
      width: 100%;
      max-width: 1200px;
      background: white;
      border-radius: var(--border-radius);
      box-shadow: var(--box-shadow);
      overflow: hidden;
      position: relative;
    }
    
    .container::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 6px;
      background: linear-gradient(90deg, var(--primary), var(--accent));
    }
    
    .header {
      padding: 30px 40px;
      text-align: center;
      position: relative;
      background: linear-gradient(135deg, rgba(108, 92, 231, 0.05) 0%, rgba(253, 121, 168, 0.05) 100%);
      border-bottom: 1px solid var(--light-gray);
    }
    
    h1 {
      font-size: 2.8rem;
      font-weight: 700;
      margin-bottom: 10px;
      color: var(--primary);
      display: inline-flex;
      align-items: center;
      gap: 15px;
    }
    
    h1 .icon {
      background: linear-gradient(135deg, var(--primary), var(--accent));
      -webkit-background-clip: text;
      background-clip: text;
      color: transparent;
    }
    
    .subtitle {
      color: var(--gray);
      font-size: 1.1rem;
      max-width: 600px;
      margin: 0 auto 15px;
    }
    
    .tabs {
      display: flex;
      justify-content: center;
      margin-top: 20px;
      gap: 10px;
    }
    
    .tab {
      padding: 8px 20px;
      border-radius: 50px;
      background: white;
      border: 1px solid var(--light-gray);
      color: var(--gray);
      font-weight: 500;
      cursor: pointer;
      transition: var(--transition);
    }
    
    .tab.active {
      background: var(--primary);
      color: white;
      border-color: var(--primary);
    }
    
    .tab:hover:not(.active) {
      background: var(--light);
    }
    
    .form-container {
      display: grid;
      grid-template-columns: 1fr 2fr;
      gap: 30px;
      padding: 40px;
    }
    
    @media (max-width: 992px) {
      .form-container {
        grid-template-columns: 1fr;
      }
    }
    
    .form-section {
      background: white;
      padding: 30px;
      border-radius: var(--border-radius);
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
      border: 1px solid var(--light-gray);
      transition: var(--transition);
    }
    
    .form-section:hover {
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
    }
    
    .form-section h2 {
      font-size: 1.4rem;
      margin-bottom: 25px;
      color: var(--primary-dark);
      display: flex;
      align-items: center;
      gap: 12px;
      padding-bottom: 10px;
      border-bottom: 2px solid var(--light-gray);
    }
    
    .form-section h2 i {
      color: var(--accent);
    }
    
    .form-group {
      margin-bottom: 25px;
    }
    
    label {
      display: block;
      margin-bottom: 10px;
      font-weight: 600;
      color: var(--dark);
      font-size: 0.95rem;
    }
    
    .input-wrapper {
      position: relative;
    }
    
    input[type="text"],
    input[type="number"],
    input[type="email"],
    textarea,
    select {
      width: 100%;
      padding: 14px 18px;
      border: 1px solid var(--light-gray);
      border-radius: var(--border-radius-sm);
      font-size: 0.95rem;
      transition: var(--transition);
      background: white;
      font-family: 'Inter', sans-serif;
    }
    
    input[type="text"]:focus,
    input[type="number"]:focus,
    input[type="email"]:focus,
    textarea:focus,
    select:focus {
      outline: none;
      border-color: var(--primary);
      box-shadow: 0 0 0 3px rgba(108, 92, 231, 0.2);
    }
    
    textarea {
      min-height: 120px;
      resize: vertical;
      line-height: 1.7;
    }
    
    .btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      padding: 14px 28px;
      background: linear-gradient(135deg, var(--primary), var(--primary-dark));
      color: white;
      border: none;
      border-radius: var(--border-radius-sm);
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      transition: var(--transition);
      box-shadow: 0 4px 15px rgba(108, 92, 231, 0.3);
      width: 100%;
    }
    
    .btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(108, 92, 231, 0.4);
      background: linear-gradient(135deg, var(--primary-dark), var(--primary));
    }
    
    .btn-secondary {
      background: white;
      color: var(--primary);
      border: 1px solid var(--primary);
      box-shadow: none;
    }
    
    .btn-secondary:hover {
      background: var(--light);
      box-shadow: none;
    }
    
    .btn i {
      font-size: 0.9rem;
    }
    
    .player-section {
      background: white;
      border-radius: var(--border-radius);
      padding: 30px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
      border: 1px solid var(--light-gray);
    }
    
    .player-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 25px;
      padding-bottom: 15px;
      border-bottom: 2px solid var(--light-gray);
    }
    
    .player-header h2 {
      color: var(--primary-dark);
      font-size: 1.5rem;
      display: flex;
      align-items: center;
      gap: 12px;
    }
    
    .book-cover {
      width: 100%;
      max-width: 250px;
      border-radius: var(--border-radius-sm);
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      border: 1px solid var(--light-gray);
      aspect-ratio: 2/3;
      object-fit: cover;
      background: #f0f0f0;
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--gray);
      font-size: 0.9rem;
      text-align: center;
      padding: 20px;
      margin: 0 auto 20px;
    }
    
    .controls {
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 20px;
      margin: 30px 0;
    }
    
    .control-btn {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      background: var(--primary);
      color: white;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 24px;
      border: none;
      box-shadow: 0 4px 15px rgba(108, 92, 231, 0.3);
      transition: var(--transition);
      cursor: pointer;
    }
    
    .control-btn:hover {
      background: var(--primary-dark);
      transform: scale(1.05);
    }
    
    .speed-control {
      display: flex;
      align-items: center;
      gap: 10px;
      justify-content: center;
    }
    
    .speed-control label {
      margin: 0;
      font-size: 0.9rem;
      color: var(--gray);
    }
    
    .progress-container {
      width: 100%;
      height: 8px;
      background: var(--light-gray);
      border-radius: 4px;
      margin: 20px 0;
      cursor: pointer;
    }
    
    .progress-bar {
      width: 0%;
      height: 100%;
      background: var(--primary);
      border-radius: 4px;
    }
    
    .time-display {
      display: flex;
      justify-content: space-between;
      font-size: 0.9rem;
      color: var(--gray);
      margin-bottom: 20px;
    }
    
    .voice-options {
      margin-top: 20px;
      border-top: 1px solid var(--light-gray);
      padding-top: 20px;
    }
    
    .voice-options h3 {
      margin-bottom: 15px;
      color: var(--primary-dark);
      font-size: 1.1rem;
    }
    
    .voice-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
      gap: 15px;
    }
    
    .voice-option {
      padding: 12px;
      border-radius: var(--border-radius-sm);
      border: 2px solid var(--light-gray);
      cursor: pointer;
      transition: var(--transition);
      display: flex;
      align-items: center;
      gap: 10px;
    }
    
    .voice-option:hover {
      border-color: var(--primary);
      background: var(--light);
    }
    
    .voice-option.active {
      border-color: var(--primary);
      background: var(--light);
      font-weight: 600;
    }
    
    .voice-option i {
      color: var(--accent);
    }
    
    .footer {
      text-align: center;
      padding: 25px 40px;
      border-top: 1px solid var(--light-gray);
      color: var(--gray);
      font-size: 0.9rem;
      background: linear-gradient(135deg, rgba(108, 92, 231, 0.03) 0%, rgba(253, 121, 168, 0.03) 100%);
    }
    
    .footer a {
      color: var(--primary);
      text-decoration: none;
      font-weight: 600;
      transition: var(--transition);
    }
    
    .footer a:hover {
      color: var(--accent);
      text-decoration: underline;
    }
    
    /* Animations */
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }
    
    .form-section {
      animation: fadeIn 0.5s ease-out forwards;
    }
    
    .form-section:nth-child(2) {
      animation-delay: 0.1s;
    }
    
    .player-section {
      animation: fadeIn 0.5s ease-out 0.2s forwards;
      opacity: 0;
    }
    
    /* Tooltip */
    .tooltip {
      position: relative;
      display: inline-block;
      margin-left: 5px;
    }
    
    .tooltip i {
      color: var(--accent);
      font-size: 0.9rem;
      cursor: help;
    }
    
    .tooltip-text {
      visibility: hidden;
      width: 220px;
      background-color: var(--dark);
      color: #fff;
      text-align: center;
      border-radius: var(--border-radius-sm);
      padding: 10px;
      position: absolute;
      z-index: 1;
      bottom: 125%;
      left: 50%;
      transform: translateX(-50%);
      opacity: 0;
      transition: opacity 0.3s;
      font-size: 0.85rem;
      font-weight: normal;
      line-height: 1.5;
    }
    
    .tooltip:hover .tooltip-text {
      visibility: visible;
      opacity: 1;
    }
    
    @media (max-width: 768px) {
      .form-container {
        grid-template-columns: 1fr;
      }
      
      .controls {
        gap: 15px;
      }
      
      .control-btn {
        width: 50px;
        height: 50px;
        font-size: 20px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <h1><i class="fas fa-book-reader icon"></i> Audio Book com IA</h1>
      <p class="subtitle">Transforme qualquer texto em um audiobook narrado por inteligência artificial</p>
    </div>
    
    <div class="form-container">
      <div class="form-section">
        <h2><i class="fas fa-file-alt"></i> Seu Conteúdo</h2>
        
        <div class="form-group">
          <label for="bookTitle">Título do Livro/Artigo</label>
          <input type="text" id="bookTitle" placeholder="Ex: Como Desenvolver um App em 30 Dias" required>
        </div>
        
        <div class="form-group">
          <label for="authorName">Autor</label>
          <input type="text" id="authorName" placeholder="Ex: João da Silva">
        </div>
        
        <div class="form-group">
          <label for="textInput">Texto para conversão em áudio</label>
          <textarea id="textInput" placeholder="Cole aqui o texto que deseja converter em audiobook..."></textarea>
        </div>
        
        <div class="form-group">
          <label>Selecione o idioma do texto</label>
          <select id="languageSelect">
            <option value="pt-BR" selected>Português Brasileiro</option>
            <option value="en-US">Inglês Americano</option>
            <option value="es-ES">Espanhol</option>
            <option value="fr-FR">Francês</option>
          </select>
        </div>
      </div>
      
      <div class="player-section">
        <div class="player-header">
          <h2><i class="fas fa-headphones-alt"></i> Player de Áudio</h2>
        </div>
        
        <div class="book-cover">
          <i class="fas fa-microphone-alt" style="font-size: 3rem; color: var(--primary);"></i>
        </div>
        
        <div class="time-display">
          <span id="currentTime">0:00</span>
          <span id="durationTime">0:00</span>
        </div>
        
        <div class="progress-container" id="progressContainer">
          <div class="progress-bar" id="progressBar"></div>
        </div>
        
        <div class="controls">
          <button class="control-btn" id="playPauseBtn" title="Reproduzir/Pausar"><i class="fas fa-play"></i></button>
          <button class="control-btn" id="stopBtn" title="Parar"><i class="fas fa-stop"></i></button>
          
          <div class="speed-control">
            <label for="speedControl">Velocidade:</label>
            <select id="speedControl">
              <option value="0.5">0.5x</option>
              <option value="0.75">0.75x</option>
              <option value="1" selected>1x</option>
              <option value="1.25">1.25x</option>
              <option value="1.5">1.5x</option>
              <option value="2">2x</option>
            </select>
          </div>
        </div>
        
        <div class="voice-options">
          <h3>Vozes Disponíveis</h3>
          <div class="voice-grid" id="voiceGrid">
            <!-- Vozes serão carregadas dinamicamente -->
          </div>
        </div>
      </div>
    </div>
    
    <div class="footer">
      <p> 2023 Book Club | <a href="<?php echo generateLink('home'); ?>"><i class="fas fa-life-ring"></i> Ajuda</a> | <a href="<?php echo generateLink('login'); ?>"><i class="fas fa-envelope"></i> Contato</a> | <a href="<?php echo generateLink('home'); ?>"><i class="fas fa-shield-alt"></i> Privacidade</a></p>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const textInput = document.getElementById('textInput');
      const playPauseBtn = document.getElementById('playPauseBtn');
      const stopBtn = document.getElementById('stopBtn');
      const speedControl = document.getElementById('speedControl');
      const voiceGrid = document.getElementById('voiceGrid');
      const bookTitle = document.getElementById('bookTitle');
      const languageSelect = document.getElementById('languageSelect');
      const progressBar = document.getElementById('progressBar');
      const progressContainer = document.getElementById('progressContainer');
      const currentTimeDisplay = document.getElementById('currentTime');
      const durationTimeDisplay = document.getElementById('durationTime');
      
      let utterance = null;
      let isPlaying = false;
      let currentVoiceIndex = 0;
      let voices = [];
      let speechRate = 1;
      let startTime = 0;
      let pauseTime = 0;
      let totalDuration = 0;
      let timerInterval = null;

      // Função para carregar vozes disponíveis
      function loadVoices() {
        voices = window.speechSynthesis.getVoices();
        voiceGrid.innerHTML = '';
        
        if (voices.length === 0) {
          voiceGrid.innerHTML = '<p>Nenhuma voz encontrada. Verifique se seu navegador suporta síntese de fala.</p>';
          return;
        }

        voices.forEach((voice, index) => {
          const voiceElement = document.createElement('div');
          voiceElement.className = 'voice-option';
          voiceElement.setAttribute('data-index', index);
          voiceElement.innerHTML = `
            <i class="fas fa-volume-up"></i>
            <div>
              <strong>${voice.name}</strong><br>
              <small>${voice.lang} ${voice.default ? '(Padrão)' : ''}</small>
            </div>
          `;
          
          if (index === 0 || voice.default) {
            voiceElement.classList.add('active');
            currentVoiceIndex = index;
          }
          
          voiceGrid.appendChild(voiceElement);
        });
        
        // Adicionar evento de clique às opções de voz
        document.querySelectorAll('.voice-option').forEach(option => {
          option.addEventListener('click', () => {
            document.querySelectorAll('.voice-option').forEach(opt => opt.classList.remove('active'));
            option.classList.add('active');
            currentVoiceIndex = parseInt(option.getAttribute('data-index'));
          });
        });
      }

      // Inicializar vozes
      loadVoices();
      
      // Recarregar vozes caso demorem para carregar
      if (window.speechSynthesis.onvoiceschanged !== undefined) {
        window.speechSynthesis.onvoiceschanged = loadVoices;
      }

      // Configurar eventos dos botões
      playPauseBtn.addEventListener('click', togglePlayPause);
      stopBtn.addEventListener('click', stopPlayback);
      speedControl.addEventListener('change', () => {
        speechRate = parseFloat(speedControl.value);
        if (utterance) {
          utterance.rate = speechRate;
        }
      });

      // Função para iniciar ou pausar a reprodução
      function togglePlayPause() {
        if (!isPlaying) {
          startPlayback();
        } else {
          pausePlayback();
        }
      }

      // Função para iniciar a reprodução
      function startPlayback() {
        if (!utterance || speechSynthesis.paused) {
          resumePlayback();
          return;
        }
        
        const text = textInput.value.trim();
        if (!text) {
          alert('Por favor, insira o texto que deseja converter em áudio.');
          return;
        }
        
        // Limpar qualquer reprodução anterior
        speechSynthesis.cancel();
        progressBar.style.width = '0%';
        currentTimeDisplay.textContent = '0:00';
        durationTimeDisplay.textContent = '0:00';
        pauseTime = 0;
        totalDuration = 0;
        
        // Criar nova utterance
        utterance = new SpeechSynthesisUtterance(text);
        utterance.voice = voices[currentVoiceIndex];
        utterance.lang = languageSelect.value;
        utterance.rate = speechRate;
        
        // Obter duração aproximada (não é exato)
        totalDuration = estimateDuration(text);
        durationTimeDisplay.textContent = formatTime(totalDuration);
        
        // Eventos
        utterance.onstart = () => {
          isPlaying = true;
          playPauseBtn.innerHTML = '<i class="fas fa-pause"></i>';
          startTime = Date.now();
          startTimer();
        };
        
        utterance.onend = () => {
          isPlaying = false;
          playPauseBtn.innerHTML = '<i class="fas fa-play"></i>';
          progressBar.style.width = '100%';
          currentTimeDisplay.textContent = durationTimeDisplay.textContent;
          stopTimer();
        };
        
        utterance.onpause = () => {
          isPlaying = false;
          playPauseBtn.innerHTML = '<i class="fas fa-play"></i>';
          pauseTime = Date.now();
          stopTimer();
        };
        
        utterance.onresume = () => {
          isPlaying = true;
          playPauseBtn.innerHTML = '<i class="fas fa-pause"></i>';
          startTime = Date.now() - (pauseTime - startTime);
          startTimer();
        };
        
        utterance.onboundary = (event) => {
          if (event.name === 'word') {
            updateProgress(event.charIndex / text.length);
          }
        };
        
        speechSynthesis.speak(utterance);
      }

      // Função para pausar a reprodução
      function pausePlayback() {
        if (isPlaying && speechSynthesis.speaking) {
          speechSynthesis.pause();
          isPlaying = false;
          playPauseBtn.innerHTML = '<i class="fas fa-play"></i>';
          stopTimer();
        }
      }

      // Função para retomar a reprodução
      function resumePlayback() {
        if (speechSynthesis.paused) {
          speechSynthesis.resume();
          isPlaying = true;
          playPauseBtn.innerHTML = '<i class="fas fa-pause"></i>';
          startTime = Date.now() - (pauseTime - startTime);
          startTimer();
        }
      }

      // Função para parar a reprodução
      function stopPlayback() {
        if (speechSynthesis.speaking || speechSynthesis.paused) {
          speechSynthesis.cancel();
          isPlaying = false;
          playPauseBtn.innerHTML = '<i class="fas fa-play"></i>';
          progressBar.style.width = '0%';
          currentTimeDisplay.textContent = '0:00';
          durationTimeDisplay.textContent = '0:00';
          stopTimer();
        }
      }

      // Função para atualizar a barra de progresso
      function updateProgress(percentage) {
        progressBar.style.width = `${percentage * 100}%`;
      }

      // Função para calcular a duração estimada do áudio
      function estimateDuration(text) {
        // Estimativa baseada em palavras por minuto (aproximadamente 150 palavras/minuto)
        const words = text.split(/\s+/).length;
        const minutes = words / 150;
        return minutes * 60 * 1000; // Em milissegundos
      }

      // Função para formatar tempo em mm:ss
      function formatTime(ms) {
        const totalSeconds = Math.floor(ms / 1000);
        const minutes = Math.floor(totalSeconds / 60);
        const seconds = totalSeconds % 60;
        return `${minutes}:${seconds.toString().padStart(2, '0')}`;
      }

      // Função para iniciar o temporizador
      function startTimer() {
        stopTimer(); // Parar temporizador anterior, se existir
        timerInterval = setInterval(() => {
          const elapsed = Date.now() - startTime;
          const percentage = Math.min(elapsed / totalDuration, 1);
          updateProgress(percentage);
          currentTimeDisplay.textContent = formatTime(elapsed);
        }, 100);
      }

      // Função para parar o temporizador
      function stopTimer() {
        if (timerInterval) {
          clearInterval(timerInterval);
          timerInterval = null;
        }
      }

      // Atualizar idioma quando selecionado
      languageSelect.addEventListener('change', () => {
        if (utterance) {
          utterance.lang = languageSelect.value;
        }
      });

      // Permitir pular para posição específica no áudio
      progressContainer.addEventListener('click', (e) => {
        if (!utterance || !isPlaying) return;
        
        const rect = progressContainer.getBoundingClientRect();
        const clickPosition = (e.clientX - rect.left) / rect.width;
        
        // Esta funcionalidade requer mais trabalho pois a Web Speech API não suporta pular diretamente
        // Aqui está apenas uma implementação básica que reinicia a reprodução do novo ponto
        speechSynthesis.cancel();
        progressBar.style.width = `${clickPosition * 100}%`;
        currentTimeDisplay.textContent = formatTime(clickPosition * totalDuration);
        
        // Reiniciar a utterance para começar a partir do novo ponto
        const text = textInput.value.trim();
        const chars = text.length;
        const startPos = Math.floor(chars * clickPosition);
        
        const partialUtterance = new SpeechSynthesisUtterance(text.substring(startPos));
        partialUtterance.voice = voices[currentVoiceIndex];
        partialUtterance.lang = languageSelect.value;
        partialUtterance.rate = speechRate;
        
        speechSynthesis.speak(partialUtterance);
        
        // Atualizar variáveis
        startTime = Date.now();
        startTimer();
      });
      
      // Carregar título automaticamente
      bookTitle.addEventListener('input', () => {
        const title = bookTitle.value || 'Sem Título';
        document.title = `${title} | Audio Book com IA`;
      });
      
      // Carregar idioma automaticamente
      languageSelect.addEventListener('change', () => {
        if (utterance) {
          utterance.lang = languageSelect.value;
        }
      });
      
      // Exibir aviso se o navegador não suportar Web Speech API
      if (!('speechSynthesis' in window)) {
        const warning = document.createElement('div');
        warning.style.color = 'var(--error)';
        warning.style.padding = '15px';
        warning.style.backgroundColor = 'rgba(214, 48, 49, 0.1)';
        warning.style.borderRadius = 'var(--border-radius-sm)';
        warning.style.marginTop = '20px';
        warning.innerHTML = '<i class="fas fa-exclamation-triangle"></i> Seu navegador não suporta a API de Síntese de Fala. Recomenda-se usar o Google Chrome ou Edge para melhor experiência.';
        
        document.querySelector('.player-section').prepend(warning);
      }
    });
  </script>
</body>
</html>