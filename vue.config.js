const  {defineConfig} = require('@vue/cli-service')
module.exports = defineConfig({
  transpileDependencies: true,

  devServer: {

    // proxy: {
    //   '/sanctum': {
    //     target: 'http://127.1.0.1:8080',
    //     ws: true,
    //     changeOrigin: true,
    //    // PathRewrite: {'^/sanctum': '/sanctum'},
    //     //logLevel: 'debug'
    //   },
    //   '/api': {
    //     target: 'http://127.1.0.1:8080',
    //     ws: true,
    //     changeOrigin: true,
    //     //PathRewrite: {'^/api': '/api'},
    //     //logLevel: 'debug'
    //   }
    // }

    proxy: 'http://127.1.0.1:8080'
  }
  })

