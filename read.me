# KDUSMS CI/CD Pipeline

## Overview
This repository contains the setup instructions and Jenkins pipeline configuration for deploying the **KDU Student Management System (KDUSMS)** using **Jenkins, Docker, Trivy, and Docker Scout**. The CI/CD pipeline automates security scanning, Docker image building, and deployment.

---

## 🚀 Installation Guide

### 1️⃣ Install AWS CLI
```sh
sudo apt install unzip -y
curl "https://awscli.amazonaws.com/awscli-exe-linux-x86_64.zip" -o "awscliv2.zip"
unzip awscliv2.zip
sudo ./aws/install
```

### 2️⃣ Install Jenkins on Ubuntu
```sh
#!/bin/bash
sudo apt update -y
wget -O - https://packages.adoptium.net/artifactory/api/gpg/key/public | sudo tee /etc/apt/keyrings/adoptium.asc
echo "deb [signed-by=/etc/apt/keyrings/adoptium.asc] https://packages.adoptium.net/artifactory/deb $(awk -F= '/^VERSION_CODENAME/{print$2}' /etc/os-release) main" | sudo tee /etc/apt/sources.list.d/adoptium.list
sudo apt update -y
sudo apt install temurin-17-jdk -y
/usr/bin/java --version
curl -fsSL https://pkg.jenkins.io/debian-stable/jenkins.io-2023.key | sudo tee /usr/share/keyrings/jenkins-keyring.asc > /dev/null
echo deb [signed-by=/usr/share/keyrings/jenkins-keyring.asc] https://pkg.jenkins.io/debian-stable binary/ | sudo tee /etc/apt/sources.list.d/jenkins.list > /dev/null
sudo apt-get update -y
sudo apt-get install jenkins -y
sudo systemctl start jenkins
sudo systemctl status jenkins
```

### 3️⃣ Install Docker on Ubuntu
```sh
sudo apt-get update
sudo apt-get install ca-certificates curl
sudo install -m 0755 -d /etc/apt/keyrings
sudo curl -fsSL https://download.docker.com/linux/ubuntu/gpg -o /etc/apt/keyrings/docker.asc
sudo chmod a+r /etc/apt/keyrings/docker.asc
echo "deb [arch=$(dpkg --print-architecture) signed-by=/etc/apt/keyrings/docker.asc] https://download.docker.com/linux/ubuntu $(. /etc/os-release && echo "$VERSION_CODENAME") stable" | sudo tee /etc/apt/sources.list.d/docker.list > /dev/null
sudo apt-get update
sudo apt-get install docker-ce docker-ce-cli containerd.io docker-buildx-plugin docker-compose-plugin -y
sudo usermod -aG docker ubuntu
sudo chmod 777 /var/run/docker.sock
newgrp docker
sudo systemctl status docker
```

### 4️⃣ Install Trivy for Security Scanning
📄 **Reference:** [Trivy Installation Guide](https://aquasecurity.github.io/trivy/v0.55/getting-started/installation/)
```sh
sudo apt-get install wget apt-transport-https gnupg
wget -qO - https://aquasecurity.github.io/trivy-repo/deb/public.key | gpg --dearmor | sudo tee /usr/share/keyrings/trivy.gpg > /dev/null
echo "deb [signed-by=/usr/share/keyrings/trivy.gpg] https://aquasecurity.github.io/trivy-repo/deb generic main" | sudo tee -a /etc/apt/sources.list.d/trivy.list
sudo apt-get update
sudo apt-get install trivy
```

### 5️⃣ Install Docker Scout
```sh
docker login       # Provide Docker Hub credentials here
curl -sSfL https://raw.githubusercontent.com/docker/scout-cli/main/install.sh | sh -s -- -b /usr/local/bin
```

---

## 📜 Jenkins Pipeline Configuration

Create a **Jenkinsfile** in the root of your repository with the following content:

```groovy
pipeline {
    agent any

    environment {
        DOCKER_HUB_USER = 'dopramo'
        IMAGE_NAME = 'dopramo/kdusms'
        CONTAINER_NAME = "kdusms_app"
    }

    stages {
        stage('Clone Repository') {
            steps {
                git branch: 'main', url: 'https://github.com/dopramo/kdusms.git'
            }
        }

        stage('Security Scan') {
            steps {
                sh 'trivy fs --exit-code 1 --severity HIGH,CRITICAL . || true'
                sh 'docker scout quickview ${IMAGE_NAME} || true'
            }
        }

        stage('Build Docker Image') {
            steps {
                sh 'docker build -t ${IMAGE_NAME}:latest .'
            }
        }

        stage('Push to Docker Hub') {
            steps {
                withCredentials([string(credentialsId: 'docker-hub-token', variable: 'DOCKER_TOKEN')]) {
                    sh '''
                    echo $DOCKER_TOKEN | docker login -u ${DOCKER_HUB_USER} --password-stdin
                    docker tag ${IMAGE_NAME}:latest ${IMAGE_NAME}:latest
                    docker push ${IMAGE_NAME}:latest
                    '''
                }
            }
        }

        stage('Run Container') {
            steps {
                sh '''
                docker stop ${CONTAINER_NAME} || true
                docker rm ${CONTAINER_NAME} || true
                docker run -d --name ${CONTAINER_NAME} -p 3000:80 ${IMAGE_NAME}:latest
                '''
            }
        }
    }
}
```

---

## 📌 Key Features
✅ **Automated CI/CD Pipeline** - Streamlined development process
✅ **Security Scanning** - Uses Trivy and Docker Scout
✅ **Dockerization** - Build, push, and deploy using Docker
✅ **Continuous Deployment** - Deploys the latest version automatically

---

## 🛠️ Usage
1. Clone the repository:
   ```sh
   git clone https://github.com/dopramo/kdusms.git
   ```
2. Configure your **Jenkins credentials** for Docker Hub.
3. Run the Jenkins pipeline.

---

## 📬 Support
For any issues or questions, please open an issue in the [GitHub repository](https://github.com/dopramo/kdusms/issues).

---

🚀 **Happy Coding!** 🎉
