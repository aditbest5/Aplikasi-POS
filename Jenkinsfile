pipeline {
    agent any
    triggers {
        githubPush()
    }

    stages {
        stage('Build') {
            steps {
                script {
                    // Membangun image Docker
                    sh 'docker build -t aditbest5/pos .'
                }
            }
        }

        stage('Deliver') {
            steps {
                script {
                    // Menghentikan dan menghapus container yang berjalan, jika ada
                    sh 'docker container stop pos-container || true'
                    sh 'docker container rm pos-container || true'

                    // Menjalankan container baru dalam mode detached (-d)
                    sh 'docker run -d --name pos-container -p 8800:8800 aditbest5/pos &'
                }
            }
        }
    }

    post {
        always {
            script {
                // Membersihkan image yang tidak digunakan
                sh 'docker image prune -f || true'
            }
        }
    }
}
