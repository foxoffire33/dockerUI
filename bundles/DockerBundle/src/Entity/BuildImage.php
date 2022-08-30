<?php

namespace DeLaParra\DockerBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class BuildImage
{
    /**
     * Path within the build context to the Dockerfile.
     * This is ignored if remote is specified and points to an external Dockerfile.
     * @var string
     */
    private string $dockerfile = 'Dockerfile';

    /**
     * A name and optional tag to apply to the image in the name:tag format.
     * If you omit the tag the default latest value is assumed. You can provide several t parameters.
     * @var string
     */
    private string $t;

    /**
     * Extra hosts to add to /etc/hosts
     * @var string
     */
    private string $extrahosts;

    /**
     * A Git repository URI or HTTP/HTTPS context URI.
     * If the URI points to a single text file, the file’s contents are placed into a file called Dockerfile and the image is built from that file.
     * If the URI points to a tarball, the file is downloaded by the daemon and the contents therein used as the context for the build.
     * If the URI points to a tarball and the dockerfile parameter is also specified, there must be a file with the corresponding path inside the tarball.
     * @var string
     */
    #[Assert\Url]
    private string $remote;

    /**
     * Suppress verbose build output.
     * @var bool
     */
    private bool $q = false;

    /**
     * Do not use the cache when building the image.
     * @var bool
     */
    private bool $nocache = false;

    /**
     * JSON array of images used for build cache resolution.
     * @var string
     */
    #[Assert\Json]
    private $cachefrom;

    /**
     * Attempt to pull the image even if an older image exists locally.
     * @var string
     */
    private string $pull;

    /**
     * Remove intermediate containers after a successful build.
     * @var bool
     */
    private bool $rm = true;

    /**
     * Always remove intermediate containers, even upon failure.
     * @var bool
     */
    private bool $forcerm = false;

    /**
     * Set memory limit for build.
     * @var int
     */
    private int $memory = 128;

    /**
     * Total memory (memory + swap). Set as -1 to disable swap.
     * @var int
     */
    private int $memswap;

    /**
     * CPU shares (relative weight).
     * @var int
     */
    private int $cpushares;

    /**
     * CPUs in which to allow execution (e.g., 0-3, 0,1).
     * @var string
     */
    private string $cpusetcpus;

    /**
     * The length of a CPU period in microseconds.
     * @var int
     */
    private int $cpuperiod;

    /**
     * Microseconds of CPU time that the container can get in a CPU period.
     * @var int
     */
    private int $cpuquota;

    /**
     * JSON map of string pairs for build-time variables. Users pass these values at build-time. Docker uses the buildargs as the environment context for commands run via the Dockerfile RUN instruction, or for variable expansion in other Dockerfile instructions. This is not meant for passing secret values.
     * For example, the build arg FOO=bar would become {"FOO":"bar"} in JSON. This would result in the query parameter buildargs={"FOO":"bar"}. Note that {"FOO":"bar"} should be URI component encoded.
     * @var string
     */
    private string $buildargs;

    /**
     * Size of /dev/shm in bytes. The size must be greater than 0. If omitted the system uses 64MB.
     * @var int
     */
    private int $shmsize;

    /**
     * Squash the resulting images layers into a single layer. (Experimental release only.)
     * @var bool
     */
    private bool $squash;

    /**
     * Arbitrary key/value labels to set on the image, as a JSON map of string pairs.
     * @var string
     */
    private string $labels;

    /**
     * Sets the networking mode for the run commands during build. Supported standard values are: bridge, host, none, and container:<name|id>. Any other value is taken as a custom network's name or ID to which this container should connect to.
     * @var string
     */
    private string $networkmode;

    /**
     * Platform in the format os[/arch[/variant]]
     * @var string
     */
    private string $platform = '';

    /**
     * Target build stage
     * @var string
     */
    private string $target = '';

    /**
     * BuildKit output configuration
     * @var string
     */
    private string $outputs = '';

    /**
     * @return string
     */
    public function getDockerfile(): string
    {
        return $this->dockerfile;
    }

    /**
     * @param string $dockerfile
     */
    public function setDockerfile(string $dockerfile): void
    {
        $this->dockerfile = $dockerfile;
    }

    /**
     * @return string
     */
    public function getT(): string
    {
        return $this->t;
    }

    /**
     * @param string $t
     */
    public function setT(string $t): void
    {
        $this->t = $t;
    }

    /**
     * @return string
     */
    public function getExtrahosts(): string
    {
        return $this->extrahosts;
    }

    /**
     * @param string $extrahosts
     */
    public function setExtrahosts(string $extrahosts): void
    {
        $this->extrahosts = $extrahosts;
    }

    /**
     * @return string
     */
    public function getRemote(): string
    {
        return $this->remote;
    }

    /**
     * @param string $remote
     */
    public function setRemote(string $remote): void
    {
        $this->remote = $remote;
    }

    /**
     * @return bool
     */
    public function isQ(): bool
    {
        return $this->q;
    }

    /**
     * @param bool $q
     */
    public function setQ(bool $q): void
    {
        $this->q = $q;
    }

    /**
     * @return bool
     */
    public function isNocache(): bool
    {
        return $this->nocache;
    }

    /**
     * @param bool $nocache
     */
    public function setNocache(bool $nocache): void
    {
        $this->nocache = $nocache;
    }

    /**
     * @return string
     */
    public function getCachefrom(): string
    {
        return $this->cachefrom;
    }

    /**
     * @param string $cachefrom
     */
    public function setCachefrom(string $cachefrom): void
    {
        $this->cachefrom = $cachefrom;
    }

    /**
     * @return string
     */
    public function getPull(): string
    {
        return $this->pull;
    }

    /**
     * @param string $pull
     */
    public function setPull(string $pull): void
    {
        $this->pull = $pull;
    }

    /**
     * @return bool
     */
    public function isRm(): bool
    {
        return $this->rm;
    }

    /**
     * @param bool $rm
     */
    public function setRm(bool $rm): void
    {
        $this->rm = $rm;
    }

    /**
     * @return bool
     */
    public function isForcerm(): bool
    {
        return $this->forcerm;
    }

    /**
     * @param bool $forcerm
     */
    public function setForcerm(bool $forcerm): void
    {
        $this->forcerm = $forcerm;
    }

    /**
     * @return int
     */
    public function getMemory(): int
    {
        return $this->memory;
    }

    /**
     * @param int $memory
     */
    public function setMemory(int $memory): void
    {
        $this->memory = $memory;
    }

    /**
     * @return int
     */
    public function getMemswap(): int
    {
        return $this->memswap;
    }

    /**
     * @param int $memswap
     */
    public function setMemswap(int $memswap): void
    {
        $this->memswap = $memswap;
    }

    /**
     * @return int
     */
    public function getCpushares(): int
    {
        return $this->cpushares;
    }

    /**
     * @param int $cpushares
     */
    public function setCpushares(int $cpushares): void
    {
        $this->cpushares = $cpushares;
    }

    /**
     * @return string
     */
    public function getCpusetcpus(): string
    {
        return $this->cpusetcpus;
    }

    /**
     * @param string $cpusetcpus
     */
    public function setCpusetcpus(string $cpusetcpus): void
    {
        $this->cpusetcpus = $cpusetcpus;
    }

    /**
     * @return int
     */
    public function getCpuperiod(): int
    {
        return $this->cpuperiod;
    }

    /**
     * @param int $cpuperiod
     */
    public function setCpuperiod(int $cpuperiod): void
    {
        $this->cpuperiod = $cpuperiod;
    }

    /**
     * @return int
     */
    public function getCpuquota(): int
    {
        return $this->cpuquota;
    }

    /**
     * @param int $cpuquota
     */
    public function setCpuquota(int $cpuquota): void
    {
        $this->cpuquota = $cpuquota;
    }

    /**
     * @return string
     */
    public function getBuildargs(): string
    {
        return $this->buildargs;
    }

    /**
     * @param string $buildargs
     */
    public function setBuildargs(string $buildargs): void
    {
        $this->buildargs = $buildargs;
    }

    /**
     * @return int
     */
    public function getShmsize(): int
    {
        return $this->shmsize;
    }

    /**
     * @param int $shmsize
     */
    public function setShmsize(int $shmsize): void
    {
        $this->shmsize = $shmsize;
    }

    /**
     * @return bool
     */
    public function isSquash(): bool
    {
        return $this->squash;
    }

    /**
     * @param bool $squash
     */
    public function setSquash(bool $squash): void
    {
        $this->squash = $squash;
    }

    /**
     * @return string
     */
    public function getLabels(): string
    {
        return $this->labels;
    }

    /**
     * @param string $labels
     */
    public function setLabels(string $labels): void
    {
        $this->labels = $labels;
    }

    /**
     * @return string
     */
    public function getNetworkmode(): string
    {
        return $this->networkmode;
    }

    /**
     * @param string $networkmode
     */
    public function setNetworkmode(string $networkmode): void
    {
        $this->networkmode = $networkmode;
    }

    /**
     * @return string
     */
    public function getPlatform(): string
    {
        return $this->platform;
    }

    /**
     * @param string $platform
     */
    public function setPlatform(string $platform): void
    {
        $this->platform = $platform;
    }

    /**
     * @return string
     */
    public function getTarget(): string
    {
        return $this->target;
    }

    /**
     * @param string $target
     */
    public function setTarget(string $target): void
    {
        $this->target = $target;
    }

    /**
     * @return string
     */
    public function getOutputs(): string
    {
        return $this->outputs;
    }

    /**
     * @param string $outputs
     */
    public function setOutputs(string $outputs): void
    {
        $this->outputs = $outputs;
    }

}