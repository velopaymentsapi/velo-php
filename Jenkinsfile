pipeline {
  environment {
    SPEC_FULL_BRANCHNAME = sh(returnStdout: true, script: '''echo ${spec_branch//origin\\//$''}''').trim()
    CLIENT_BUILD_SEMVER = sh(returnStdout: true, script: '''echo ${spec_branch//origin\\/v/$''}.${BUILD_NUMBER}''').trim()
    SPEC_OA3_SEMVER = ''
  }
  agent any
  stages {
    stage('prepare') {
      steps {
        script {
          def oa3semver = sh(returnStdout: true, script: '''make WORKING_SPEC=https://raw.githubusercontent.com/velopaymentsapi/VeloOpenApi/${SPEC_FULL_BRANCHNAME}/spec/openapi.yaml version''').trim()
          SPEC_OA3_SEMVER = oa3semver.replace("/n", "")
          env.SPEC_OA3_SEMVER = SPEC_OA3_SEMVER
        }

        echo "SPEC_FULL_BRANCHNAME is ${SPEC_FULL_BRANCHNAME}"
        echo "CLIENT_BUILD_SEMVER is ${CLIENT_BUILD_SEMVER}"
        echo "SPEC_OA3_SEMVER is ${SPEC_OA3_SEMVER}"
      }
    }
    stage('build') {
      steps {
        sh 'make VERSION=${CLIENT_BUILD_SEMVER} oa3config'
        sh 'make WORKING_SPEC=https://raw.githubusercontent.com/velopaymentsapi/VeloOpenApi/${SPEC_FULL_BRANCHNAME}/spec/openapi.yaml client'
      }
    }
    stage('test') {
      steps {
        sh 'make tests'
      }
    }
    stage('publish') {
      steps {
        sh 'make build'
        sh 'make VERSION=${CLIENT_BUILD_SEMVER} commit'
        sh 'make VERSION=${CLIENT_BUILD_SEMVER} publish'
      }
    }
  }
}