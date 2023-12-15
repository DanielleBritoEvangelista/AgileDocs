# Configuração do Ambiente de Desenvolvimento

Configurar o ambiente de desenvolvimento corretamente é crucial para garantir que todos os membros da equipe possam colaborar eficientemente e que o código seja executado de maneira consistente em diferentes máquinas. Aqui está um guia para configurar o ambiente de desenvolvimento para o sistema de criação e gerenciamento de documentação:

### **Ferramentas Necessárias:**

1. **Git:**
    - Instalar o Git para controle de versão.
    - Configurar as credenciais globais do Git.
    
    ```bash
    bashCopy code
    git config --global user.name "Seu Nome "
    git config --global user.email "seu@email.com"
    
    ```
    
2. **Composer:**
    - Instalar o Composer para gerenciamento de dependências PHP.
    
    ```bash
    bashCopy code
    composer install
    
    ```
    
3. **Node.js e npm:**
    - Instalar o Node.js e o npm para gerenciamento de dependências JavaScript.
    
    ```bash
    bashCopy code
    npm install
    
    ```
    

### **Configuração do Projeto Laravel (Versão Web):**

1. **Criar o arquivo .env:**
    - Copiar o arquivo **`.env.example`** para **`.env`**.
    - Configurar as informações do banco de dados e outras configurações necessárias.
    
    ```bash
    bashCopy code
    cp .env.example .env
    
    ```
    
2. **Chave de Aplicativo:**
    - Gerar uma chave de aplicativo única para o Laravel.
    
    ```bash
    bashCopy code
    php artisan key:generate
    
    ```
    
3. **Migrações e Sementes:**
    - Executar migrações para criar o esquema do banco de dados.
    
    ```bash
    bashCopy code
    php artisan migrate --seed
    
    ```
    

### **Configuração do Projeto Laravel API (Versão Mobile):**

1. **Criar o arquivo .env:**
    - Copiar o arquivo **`.env.example`** para **`.env`**.
    - Configurar as informações do banco de dados e outras configurações necessárias.
    
    ```bash
    bashCopy code
    cp .env.example .env
    
    ```
    
2. **Chave de Aplicativo:**
    - Gerar uma chave de aplicativo única para o Laravel.
    
    ```bash
    bashCopy code
    php artisan key:generate
    
    ```
    
3. **Configuração CORS:**
    - Configurar as políticas CORS para permitir solicitações da aplicação frontend.
    
    ```bash
    bashCopy code
    composer require fruitcake/laravel-cors
    php artisan vendor:publish --tag=cors
    
    ```
    

### **Configuração do Projeto React (Versão Web):**

1. **Instalação de Dependências:**
    - Instalar as dependências do projeto React.
    
    ```bash
    bashCopy code
    cd caminho/do/projeto/web
    npm install
    
    ```
    
2. **Variáveis de Ambiente:**
    - Configurar variáveis de ambiente necessárias, como a URL da API.
    
    ```bash
    bashCopy code
    REACT_APP_API_URL=http://localhost:8000/api
    
    ```
    

### **Configuração do Projeto React Native (Versão Mobile):**

1. **Instalação de Dependências:**
    - Instalar as dependências do projeto React Native.
    
    ```bash
    bashCopy code
    cd caminho/do/projeto/mobile
    npm install
    
    ```
    
2. **Variáveis de Ambiente:**
    - Configurar variáveis de ambiente necessárias, como a URL da API.
    
    ```bash
    bashCopy code
    REACT_NATIVE_API_URL=http://localhost:8000/api
    
    ```
    

### **Execução dos Projetos:**

1. **Projeto Laravel (Versão Web):**
    - Iniciar o servidor Laravel.
    
    ```bash
    bashCopy code
    php artisan serve
    
    ```
    
    - Acesse a aplicação web em **`http://localhost:8000`**.
2. **Projeto Laravel API (Versão Mobile):**
    - Iniciar o servidor Laravel.
    
    ```bash
    bashCopy code
    php artisan serve
    
    ```
    
3. **Projeto React (Versão Web):**
    - Iniciar a aplicação React.
    
    ```bash
    bashCopy code
    cd caminho/do/projeto/web
    npm start
    
    ```
    
    - Acesse a aplicação web em **`http://localhost:3000`**.
4. **Projeto React Native (Versão Mobile):**
    - Iniciar a aplicação React Native.
    
    ```bash
    bashCopy code
    cd caminho/do/projeto/mobile
    npm start
    
    ```
    
    - Execute a aplicação em um emulador ou dispositivo físico.

### **Observações:**

- **Ambiente de Desenvolvimento:**
    - Certifique-se de que o ambiente de desenvolvimento tenha o PHP, Composer, Node.js e npm instalados.
- **Configuração de Banco de Dados:**
    - Verifique se o banco de dados está configurado corretamente nas variáveis de ambiente e no arquivo **`.env`** do Laravel.
- **Configuração CORS:**
    - Configure as políticas CORS no Laravel para permitir solicitações da aplicação React.

Este guia é um ponto de partida e pode ser adaptado conforme necessário. É importante garantir que todos os membros da equipe sigam essas etapas para garantir consistência no ambiente de desenvolvimento.