pipeline {
  agent any
  options {
    buildDiscarder(logRotator(numToKeepStr: '5'))
  }
  environment {
    DOCKERHUB_CREDENTIALS = credentials('ahmadzainulmufid-dockerhub')
  }
  stages {
    stage('Updating local repository') {
      steps {
        dir('D:/xampp/htdocs/mystore/') {
          script {
            echo 'Pulling latest changes from GitHub...'
            bat 'git config --global --add safe.directory D:/xampp/htdocs/mystore'
            bat 'git pull origin main'
          }
        }
      }
    }
    stage('Build') {
      steps {
        dir('D:/xampp/htdocs/mystore/') {
          script {
            echo 'Building Docker image...'
            bat 'docker build -t ahmadzainulmufid/MyStore:latest .'
          }
        }
      }
    }
    stage('Login to Docker Hub') {
      steps {
        script {
            echo 'Logging in to Docker Hub...'
            bat 'docker login -u %DOCKERHUB_CREDENTIALS_USR% -p %DOCKERHUB_CREDENTIALS_PSW%'
        }
      }
    }
    stage('Push to Docker Hub') {
      steps {
          script {
            echo 'Pushing Docker image to Docker Hub...'
            bat 'docker push ahmadzainulmufid/MyStore:latest'
        }
      }
    }
  }
  post {
    always {
        script {
          echo 'Logging out from Docker Hub...'
          bat 'docker logout'
      }
    }
  }
}