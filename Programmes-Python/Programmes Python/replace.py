
def replace(modules, lien):
    with open('/home/pi/MagicMirror/config/config.js','r') as f:
        lines = f.readlines()
        
    with open('/home/pi/MagicMirror/config/config.js','w') as f:
        for line in lines:
            if line.startswith('hide',4):
                line = '\t'+'\t'+'\t'+'\t'+'hide: [{}]'.format(modules)+'\n'
            if line.startswith('/*cul*/url',6):
                line = '\t'+'\t'+'\t'+'\t'+'\t'+'\t'+'/*cul*/url: {}'.format(lien)+'\n'
            f.write(line)
