# Usar la imagen oficial de Parrot Security OS
FROM parrotsec/security:latest

# Evitar preguntas durante la instalación
ENV DEBIAN_FRONTEND=noninteractive

# Actualizar e instalar herramientas
RUN apt-get update && apt-get install -y \
    metasploit-framework \
    nmap \
    burpsuite \
    wireshark \
    john \
    hydra \
    git \
    vim \
    wget \
    aircrack-ng \
    sqlmap \
    nikto \
    gobuster

# Establecer el punto de entrada
CMD ["/bin/bash"]
