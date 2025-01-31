### **Resumo do Curso de Monitoramento de Sistemas e Logs no Linux**  

O curso abordou técnicas essenciais para monitoramento e análise de logs no Linux, utilizando comandos avançados, expressões regulares e scripts automatizados.  

#### **1. Comandos para Análise de Logs**  
- **Visualização de logs grandes sem travar o terminal:**  
  ```bash
  less -f /var/log/syslog
  ```
- **Monitoramento em tempo real:**  
  ```bash
  tail -f /var/log/syslog
  ```
- **Visualização de logs de autenticação:**  
  ```bash
  sudo less -f /var/log/auth.log
  ```

#### **2. Filtragem e Processamento de Logs**  
- **Busca por falhas, erros e acessos negados usando REGEX:**  
  ```bash
  grep -E "fail(ed)?|error|denied|unauthorized" /var/log/syslog
  ```
- **Formatando a saída com `awk`:**  
  ```bash
  grep -E "fail(ed)?|error|denied|unauthorized" /var/log/syslog | awk '{print $1, $2, $3, $4, $5, $6}'
  ```
- **Salvando logs filtrados em um arquivo:**  
  ```bash
  grep -E "fail(ed)?|error|denied|unauthorized" /var/log/syslog | awk '{print $1, $2, $3, $4, $5, $6}' > monitoramento_logs_sistema.txt
  ```

#### **3. Localização de Arquivos e Serviços**  
- **Local onde scripts customizados são armazenados:** `/usr/local/bin`  
- **Local de configuração de serviços no systemd:** `/etc/systemd/system`  
- **Visualização de logs de um serviço específico:**  
  ```bash
  sudo journalctl -u monitoramento-sistemas.service
  ```

#### **4. Automação com Shell Script**  
Foi desenvolvido um script para monitoramento de logs, rede, disco e hardware, organizando as informações em arquivos dentro da pasta `monitoramento/`.  

O script executa as seguintes funções:  
- **Monitoramento de logs do sistema e autenticação.**  
- **Verificação da conectividade com a internet e com um site específico (Alura).**  
- **Análise do uso de disco, excluindo partições temporárias e verificando espaço usado.**  
- **Monitoramento de hardware, incluindo uso de RAM, CPU e operações de leitura/escrita em disco.**  

A execução ocorre através da função `executar_monitoramento`, que chama todas as verificações sequencialmente.  
