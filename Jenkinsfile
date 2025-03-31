pipeline {
    agent any
    environment {
        DOCKER_IMAGE = 'kdusms-php-app'
        DOCKER_TAG = 'latest'
    }
    stages {
        stage('Checkout') {
            steps {
                git 'https://github.com/dopramo/kdusms.git'
            }
        }
        stage('Install Dependencies') {
            steps {
                sh 'composer install'
            }
        }
        stage('Build Docker Image') {
            steps {
                sh 'docker build -t $DOCKER_IMAGE:$DOCKER_TAG .'
            }
        }
        stage('Push Docker Image') {
            steps {
                withDockerRegistry([credentialsId: 'docker-hub-credentials', url: '']) {
                    sh 'docker tag $DOCKER_IMAGE:$DOCKER_TAG your-dockerhub-username/$DOCKER_IMAGE:$DOCKER_TAG'
                    sh 'docker push your-dockerhub-username/$DOCKER_IMAGE:$DOCKER_TAG'
                }
            }
        }
        stage('Deploy to EC2') {
            steps {
                sh '''
                docker stop kdusms-php-app || true
                docker rm kdusms-php-app || true
                docker pull your-dockerhub-username/$DOCKER_IMAGE:$DOCKER_TAG
                docker run -d --name kdusms-php-app -p 80:80 your-dockerhub-username/$DOCKER_IMAGE:$DOCKER_TAG
                '''
            }
        }
    }
}
