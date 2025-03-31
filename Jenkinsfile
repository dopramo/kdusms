pipeline {
    agent any

    environment {
        IMAGE_NAME = "dopramo/kdusms"
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

        stage('Run Container') {
            steps {
                sh '''
                docker stop ${CONTAINER_NAME} || true
                docker rm ${CONTAINER_NAME} || true
                docker run -d --name ${CONTAINER_NAME} -p 80:80 ${IMAGE_NAME}:latest
                '''
            }
        }
    }
}
