pipeline {
    agent any

    stages {
        stage('Git') {
            steps {
                dir('D:/xampp/htdocs/mystore') {
                    bat 'git config --global --add safe.directory D:/xampp/htdocs/mystore'
                    bat 'git status'
                    bat 'git pull https://github.com/ahmadzainulmufid/MyStore.git'
                    bat 'git branch'
                    bat 'git push https://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@github.com/ahmadzainulmufid/Mystore.git'
                    bat 'git log'
                }
            }
        }
        stage('Docker Build'){
            steps{
                dir('D:/xampp/htdocs/mystore'){
                    bat 'docker build -t ahmadzainulmufid/Mystore:latest .'
                }
            }
        }
        stage('Docker Login'){
            dir('D:/xampp/htdocs/mystore'){
                bat 'docker login -u ahmadzainulmufid -p dckr_pat_-P27vrjFDj-jKFToi93xZEf0VdI'
            }
        }
    }
    stage('Docker Push'){
        dir('D:/xampp/htdocs/mystore'){
            bat 'docker push ahmadzainulmufid/Mystore:latest'
        }
    }
}
