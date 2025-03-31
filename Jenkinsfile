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
